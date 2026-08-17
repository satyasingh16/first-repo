import axios from 'axios';

const API_BASE_URL = import.meta.env.VITE_API_BASE_URL || 'http://localhost/rest/V1';

// In a real application, the Authorization token would be fetched dynamically
// after a user logs in (e.g., from localStorage or a state management store),
// OR the backend relies on session cookies via withCredentials.
// For this scaffolding, we initialize the client to rely on credentials (cookies)
// and dynamic seller IDs instead of static tokens.
const apiClient = axios.create({
    baseURL: API_BASE_URL,
    withCredentials: true,
    headers: {
        'Content-Type': 'application/json'
    }
});

export const getProducts = async (sellerId) => {
    try {
        const response = await apiClient.get(`/seller/${sellerId}/products`);
        return response.data;
    } catch (error) {
        console.error("Error fetching products", error);
        return [];
    }
};

export const saveProduct = async (sellerId, product) => {
    try {
        const response = await apiClient.post(`/seller/${sellerId}/products`, { product });
        return response.data;
    } catch (error) {
        console.error("Error saving product", error);
        return null;
    }
};

export const deleteProduct = async (sellerId, entityId) => {
    try {
        await apiClient.delete(`/seller/${sellerId}/products/${entityId}`);
        return true;
    } catch (error) {
        console.error("Error deleting product", error);
        return false;
    }
};

export const getOrders = async (sellerId) => {
    try {
        const response = await apiClient.get(`/seller/${sellerId}/orders`);
        return response.data;
    } catch (error) {
        console.error("Error fetching orders", error);
        return [];
    }
};

export const saveOrder = async (sellerId, order) => {
    try {
        const response = await apiClient.post(`/seller/${sellerId}/orders`, { order });
        return response.data;
    } catch (error) {
        console.error("Error saving order", error);
        return null;
    }
};

export const deleteOrder = async (sellerId, entityId) => {
    try {
        await apiClient.delete(`/seller/${sellerId}/orders/${entityId}`);
        return true;
    } catch (error) {
        console.error("Error deleting order", error);
        return false;
    }
};

export const getPayments = async (sellerId) => {
    try {
        const response = await apiClient.get(`/seller/${sellerId}/payments`);
        return response.data;
    } catch (error) {
        console.error("Error fetching payments", error);
        return [];
    }
};

export const savePayment = async (sellerId, payment) => {
    try {
        const response = await apiClient.post(`/seller/${sellerId}/payments`, { payment });
        return response.data;
    } catch (error) {
        console.error("Error saving payment", error);
        return null;
    }
};

export const deletePayment = async (sellerId, entityId) => {
    try {
        await apiClient.delete(`/seller/${sellerId}/payments/${entityId}`);
        return true;
    } catch (error) {
        console.error("Error deleting payment", error);
        return false;
    }
};
