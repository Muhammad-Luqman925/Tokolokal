import http from "./axios";

const CheckoutAPI = {
  getPreview: () => http.get("/checkout/preview"),
  updateShipping: (data) => http.post("/checkout/update-shipping", data),
  create: (data) => api.post("/orders", data),
};

export default CheckoutAPI;
