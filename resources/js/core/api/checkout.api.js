<<<<<<< HEAD
/**
 * 1. IMPORT DULU 'http' (axios instance) kamu
 */
import http from "@/core/api/axios";

const CheckoutAPI = {
    getPreview: () => {
        return http.get("/checkout/preview");
    },
    updateShipping: (payload) => {
        return http.post("/checkout/update-shipping", payload);
    },
    create: (payload) => {
        /**
         * 2. GANTI 'api' JADI 'http'
         * 3. GANTI RUTE '/checkout' JADI '/orders'
         */
        return http.post("/orders", payload); // 👈 Sesuai routes/api.php
    },
};

export default CheckoutAPI;
=======
import http from "./axios";

const CheckoutAPI = {
  getPreview: () => http.get("/checkout/preview"),
  updateShipping: (data) => http.post("/checkout/update-shipping", data),
  create: (data) => api.post("/orders", data),
};

export default CheckoutAPI;
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
