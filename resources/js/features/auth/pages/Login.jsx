import "@/assets/styles/pages/Login.css";
import { useStore } from "@/core/store";
import { useNavigate, useLocation } from "react-router-dom";
import { useEffect, useState } from "react";
<<<<<<< HEAD
import http from "@/core/api/axios"; // ✅ axios instance global
=======
import http from "@/core/api/axios";
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38

const illustrationSrc = "/img/Login.png";

const Login = ({ className = "", ...props }) => {
  const rootClassName = ["halaman-login-user", className].filter(Boolean).join(" ");
  const [mode, setMode] = useState("login");
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();
  const { dispatch } = useStore();
  const location = useLocation();
  const isRegisterMode = mode === "register";

<<<<<<< HEAD
  // ✅ agar mode berubah sesuai navigasi
=======
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
  useEffect(() => {
    if (location.state?.mode === "register") {
      setMode("register");
    } else if (location.state?.mode === "login") {
      setMode("login");
    }
  }, [location.state]);

<<<<<<< HEAD
  // ✅ LOGIN CUSTOMER
  const handleLoginSubmit = async (event) => {
    event.preventDefault();
    const formData = new FormData(event.currentTarget);
    const identifier = (formData.get("identifier") || "").trim();
    const password = (formData.get("password") || "").trim();

    if (!identifier || !password) {
=======
  const handleLoginSubmit = async (event) => {
    event.preventDefault();
    const form = event.currentTarget;
    const formData = new FormData(form);
    const email = (formData.get("email") || "").trim();
    const password = (formData.get("password") || "").trim();

    if (!email || !password) {
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
      alert("Please fill in both fields!");
      return;
    }

    try {
      setLoading(true);
<<<<<<< HEAD
      const payload = {
        email: identifier.includes("@") ? identifier : null,
        phone_number: identifier.includes("@") ? null : identifier,
        password,
      };

      const res = await http.post("/customer/login", payload);

      if (res.data.token) {
        // ✅ Simpan token & user info
=======
      const payload = { email, password };
      const res = await http.post("/customer/login", payload);

      if (res.data.token) {
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
        localStorage.setItem("token", res.data.token);
        localStorage.setItem("customer", JSON.stringify(res.data.customer));

        dispatch({
          type: "LOGIN",
          payload: {
            user: res.data.customer,
            token: res.data.token,
          },
        });

<<<<<<< HEAD
        alert("✅ Login successful!");
=======
        alert("Login successful!");
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
        navigate(location.state?.redirectTo || "/", { replace: true });
      } else {
        alert(res.data.message || "Login failed. Check your credentials.");
      }
    } catch (error) {
      console.error("Login error:", error);
<<<<<<< HEAD
      alert("❌ Failed to login. Please check your email/phone and password.");
=======
      alert("Failed to login. Please check your email and password.");
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
    } finally {
      setLoading(false);
    }

<<<<<<< HEAD
    event.currentTarget.reset();
  };

  // ✅ REGISTER CUSTOMER
  const handleSignUpSubmit = async (event) => {
    event.preventDefault();
    const formData = new FormData(event.currentTarget);
    const name = (formData.get("name") || "").trim();
    const identifier = (formData.get("identifier") || "").trim();
    const password = (formData.get("password") || "").trim();

    if (!name || !identifier || !password) {
=======
    form.reset();
  };

  const handleSignUpSubmit = async (event) => {
    event.preventDefault();
    const form = event.currentTarget;
    const formData = new FormData(form);
    const name = (formData.get("name") || "").trim();
    const email = (formData.get("email") || "").trim();
    const password = (formData.get("password") || "").trim();

    if (!name || !email || !password) {
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
      alert("Please fill in all fields!");
      return;
    }

    try {
      setLoading(true);
<<<<<<< HEAD

      const payload = {
        name,
        email: identifier.includes("@") ? identifier : null,
        phone_number: identifier.includes("@") ? null : identifier,
        password,
      };

      const res = await http.post("/customer/register", payload);

      if (res.status === 201) {
        alert("🎉 Registration successful! Please login now.");
        setMode("login"); // pindah ke form login
=======
      const payload = { name, email, password };
      const res = await http.post("/customer/register", payload);

      if (res.status === 201) {
        alert("Registration successful! Please login now.");
        setMode("login");
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
      } else {
        alert(res.data.message || "Registration failed.");
      }
    } catch (error) {
      console.error("Register error:", error);
<<<<<<< HEAD
      alert("❌ Failed to register. Please try again.");
=======
      alert("Failed to register. Please try again.");
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
    } finally {
      setLoading(false);
    }

<<<<<<< HEAD
    event.currentTarget.reset();
=======
    form.reset();
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
  };

  const handleRegisterRedirect = () => setMode("register");
  const handleForgotPassword = () => navigate("/forgot-password");
<<<<<<< HEAD
  const handleSellerRedirect = () => navigate("/seller/login");
  const handleSellerSignUp = () =>
    navigate("/seller/register", { state: { source: "login", contactMethod: "phone" } });
=======
  const handleSellerRedirect = () => navigate("/admin/login");
  const handleSellerSignUp = () => navigate("/seller/register");
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
  const handleClose = () => navigate(-1);
  const handleBackToLogin = () => setMode("login");

  return (
    <div className={rootClassName} {...props}>
      <div className="login-card">
        <div className="login-card__left">
          <div className="login-copy">
            <h1 className="login-title">
<<<<<<< HEAD
              Hi, welcome{" "}
              <span className="login-title__emoji" role="img" aria-label="waving hand">
                👋
              </span>
              !
=======
              Hi, welcome <span className="login-title__emoji">??</span>!
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
            </h1>
            <p className="login-subtitle">
              New day, new arrivals. Sign in and find your dream product today!
            </p>
          </div>

<<<<<<< HEAD
          {/* ✅ Form login/register */}
=======
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
          <form
            className="login-form"
            autoComplete="off"
            onSubmit={isRegisterMode ? handleSignUpSubmit : handleLoginSubmit}
          >
<<<<<<< HEAD
            {/* 👇 Tambahkan field nama hanya saat register */}
=======
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
            {isRegisterMode && (
              <div className="form-group">
                <label className="form-label" htmlFor="register-name">
                  Full Name
                </label>
                <input
                  id="register-name"
                  name="name"
                  type="text"
                  placeholder="Enter your full name..."
                  autoComplete="off"
                />
              </div>
            )}

            <div className="form-group">
              <label className="form-label" htmlFor="login-identifier">
<<<<<<< HEAD
                Email or Phone Number
              </label>
              <input
                id="login-identifier"
                name="identifier"
                type="text"
                placeholder="Enter email or phone..."
=======
                Email
              </label>
              <input
                id="login-identifier"
                name="email"
                type="email"
                placeholder="Enter email..."
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
                autoComplete="off"
              />
            </div>

            <div className="form-group">
              <label className="form-label" htmlFor="login-password">
                Password
              </label>
              <input
                id="login-password"
                name="password"
                type="password"
                placeholder="Enter password..."
                autoComplete="new-password"
              />
<<<<<<< HEAD
              <div className="form-helper">
                {!isRegisterMode && (
                  <button type="button" className="link-button" onClick={handleForgotPassword}>
                    Forgot Password?
                  </button>
                )}
              </div>
=======
              {!isRegisterMode && (
                <div className="form-helper">
                  <button type="button" className="link-button" onClick={handleForgotPassword}>
                    Forgot Password?
                  </button>
                </div>
              )}
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
            </div>

            <button type="submit" className="login-btn" disabled={loading}>
              {loading ? "Please wait..." : isRegisterMode ? "Sign Up" : "Login"}
            </button>

            {!isRegisterMode && (
              <>
                <div className="divider">
                  <span>or</span>
                </div>
                <button type="button" className="register-btn" onClick={handleRegisterRedirect}>
                  Register
                </button>
              </>
            )}
          </form>

          {!isRegisterMode ? (
            <p className="seller-disclaimer">
              Are you a <span className="seller-word">Seller</span>?{" "}
              <button type="button" className="link-button" onClick={handleSellerRedirect}>
                Login
              </button>{" "}
              or{" "}
              <button type="button" className="link-button" onClick={handleSellerSignUp}>
                Sign up here
              </button>
            </p>
          ) : (
            <p className="seller-disclaimer seller-disclaimer--register">
              Already have an account?{" "}
              <button type="button" className="link-button" onClick={handleBackToLogin}>
                Back to Login
              </button>
            </p>
          )}
        </div>

        <div className="login-card__right" aria-hidden="true">
          <button type="button" className="close-button" aria-label="Close" onClick={handleClose}>
            &times;
          </button>
          <div className="illustration__frame">
            <img className="illustration__image" src={illustrationSrc} alt="" loading="lazy" />
          </div>
        </div>
      </div>
    </div>
  );
};

export { Login };
export default Login;
