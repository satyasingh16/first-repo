import React from 'react';
import { BrowserRouter as Router, Route, Routes, Link, useParams } from 'react-router-dom';
import Dashboard from './pages/Dashboard';
import Products from './pages/Products';
import Orders from './pages/Orders';
import Payments from './pages/Payments';

function SellerLayout() {
  let { sellerId } = useParams();

  return (
    <div className="app-container">
      <nav className="sidebar">
        <h2>Seller Hub</h2>
        <ul>
          <li><Link to={`/seller/${sellerId}/dashboard`}>Dashboard</Link></li>
          <li><Link to={`/seller/${sellerId}/products`}>Products</Link></li>
          <li><Link to={`/seller/${sellerId}/orders`}>Orders</Link></li>
          <li><Link to={`/seller/${sellerId}/payments`}>Payments</Link></li>
        </ul>
      </nav>
      <main className="content">
        <Routes>
          <Route path="dashboard" element={<Dashboard />} />
          <Route path="products" element={<Products />} />
          <Route path="orders" element={<Orders />} />
          <Route path="payments" element={<Payments />} />
        </Routes>
      </main>
    </div>
  );
}

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/seller/:sellerId/*" element={<SellerLayout />} />
        <Route path="*" element={<div><h1>Welcome to the Marketplace</h1><p>Please log in as a seller.</p></div>} />
      </Routes>
    </Router>
  );
}

export default App;
