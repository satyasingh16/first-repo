import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { getPayments, savePayment, deletePayment } from '../services/api';

function Payments() {
  const { sellerId } = useParams();
  const [payments, setPayments] = useState([]);
  const [amount, setAmount] = useState('');

  const loadPayments = () => {
    getPayments(sellerId).then(setPayments);
  };

  useEffect(() => {
    loadPayments();
  }, [sellerId]);

  const handleAddPayment = async (e) => {
    e.preventDefault();
    if (amount) {
        await savePayment(sellerId, { amount: amount, payment_date: new Date().toISOString() });
        setAmount('');
        loadPayments();
    }
  };

  const handleDeletePayment = async (entityId) => {
    await deletePayment(sellerId, entityId);
    loadPayments();
  };

  return (
    <div>
      <h1>Payments & Earnings</h1>

      <form onSubmit={handleAddPayment}>
        <input
            type="number"
            step="0.01"
            placeholder="Amount"
            value={amount}
            onChange={(e) => setAmount(e.target.value)}
            required
        />
        <button type="submit">Record Payment</button>
      </form>

      <table>
        <thead>
          <tr>
            <th>Entity ID</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {payments.map(payment => (
            <tr key={payment.entity_id}>
              <td>{payment.entity_id}</td>
              <td>${payment.amount}</td>
              <td>{payment.payment_date}</td>
              <td>
                  <button onClick={() => handleDeletePayment(payment.entity_id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default Payments;
