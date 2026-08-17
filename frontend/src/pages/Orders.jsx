import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { getOrders, saveOrder, deleteOrder } from '../services/api';

function Orders() {
  const { sellerId } = useParams();
  const [orders, setOrders] = useState([]);
  const [newOrderId, setNewOrderId] = useState('');
  const [commission, setCommission] = useState('');

  const loadOrders = () => {
    getOrders(sellerId).then(setOrders);
  };

  useEffect(() => {
    loadOrders();
  }, [sellerId]);

  const handleAddOrder = async (e) => {
    e.preventDefault();
    if (newOrderId && commission) {
        await saveOrder(sellerId, { order_id: newOrderId, commission: commission });
        setNewOrderId('');
        setCommission('');
        loadOrders();
    }
  };

  const handleDeleteOrder = async (entityId) => {
    await deleteOrder(sellerId, entityId);
    loadOrders();
  };

  return (
    <div>
      <h1>Manage Orders</h1>

      <form onSubmit={handleAddOrder}>
        <input
            type="number"
            placeholder="Magento Order ID"
            value={newOrderId}
            onChange={(e) => setNewOrderId(e.target.value)}
            required
        />
        <input
            type="number"
            step="0.01"
            placeholder="Commission"
            value={commission}
            onChange={(e) => setCommission(e.target.value)}
            required
        />
        <button type="submit">Add Order</button>
      </form>

      <table>
        <thead>
          <tr>
            <th>Entity ID</th>
            <th>Order ID</th>
            <th>Commission</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {orders.map(order => (
            <tr key={order.entity_id}>
              <td>{order.entity_id}</td>
              <td>{order.order_id}</td>
              <td>${order.commission}</td>
              <td>
                  <button onClick={() => handleDeleteOrder(order.entity_id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default Orders;
