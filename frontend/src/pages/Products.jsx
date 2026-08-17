import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { getProducts, saveProduct, deleteProduct } from '../services/api';

function Products() {
  const { sellerId } = useParams();
  const [products, setProducts] = useState([]);
  const [newProductId, setNewProductId] = useState('');

  const loadProducts = () => {
    getProducts(sellerId).then(setProducts);
  };

  useEffect(() => {
    loadProducts();
  }, [sellerId]);

  const handleAddProduct = async (e) => {
    e.preventDefault();
    if (newProductId) {
        await saveProduct(sellerId, { product_id: newProductId });
        setNewProductId('');
        loadProducts();
    }
  };

  const handleDeleteProduct = async (entityId) => {
    await deleteProduct(sellerId, entityId);
    loadProducts();
  };

  return (
    <div>
      <h1>Manage Products</h1>

      <form onSubmit={handleAddProduct}>
        <input
            type="number"
            placeholder="Magento Product ID"
            value={newProductId}
            onChange={(e) => setNewProductId(e.target.value)}
            required
        />
        <button type="submit">Add Product</button>
      </form>

      <table>
        <thead>
          <tr>
            <th>Entity ID</th>
            <th>Product ID</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {products.map(product => (
            <tr key={product.entity_id}>
              <td>{product.entity_id}</td>
              <td>{product.product_id}</td>
              <td>
                <button onClick={() => handleDeleteProduct(product.entity_id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default Products;
