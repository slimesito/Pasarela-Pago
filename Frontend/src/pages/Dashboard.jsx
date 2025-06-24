// src/pages/Dashboard.jsx
import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { useDocumentTitle } from '../hooks/useDocumentTitle';
import useAuth from "../hooks/useAuth";
import api from "../services/api";
import Navbar from "../components/Navbar";
import DeudaConsultaForm from "../components/DeudaConsultaForm";
import DeudaPagoForm from "../components/DeudaPagoForm";
import EmpresaDetalle from "../components/EmpresaDetalle";
import Notification from "../components/Notification";

export default function Dashboard() {
  useDocumentTitle('Dashboard | Consultas y Pagos');
  const { isAuthenticated, logout, user } = useAuth();
  const navigate = useNavigate();

  const [empresa, setEmpresa] = useState(null);
  const [notification, setNotification] = useState({ type: "", message: "" });

  useEffect(() => {
    const token = localStorage.getItem("token");
    if (!isAuthenticated && !token) navigate("/");
  }, [isAuthenticated, navigate]);

  const handleConsulta = async (formData) => {
    try {
      const params = new URLSearchParams(formData).toString();
      const response = await api.get(`/deuda/consultar?${params}`);
      setEmpresa(response.data);
      setNotification({ type: "success", message: "Deuda consultada exitosamente." });
    } catch (err) {
      setEmpresa(null);
      const msg = err.response?.data?.message || "Error al consultar deuda.";
      setNotification({ type: "error", message: msg });
    }
  };

  const handlePago = async (formData) => {
    try {
      await api.post("/deuda/pagar", formData);
      setNotification({ type: "success", message: "Pago registrado correctamente." });
    } catch (err) {
      const msg = err.response?.data?.error || "Error al procesar el pago.";
      setNotification({ type: "error", message: msg });
    }
  };

  return (
    <div className="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white">
      <Navbar user={user} onLogout={() => { logout(); navigate("/"); }} />
      <div className="max-w-4xl mx-auto p-6 space-y-6">
        <DeudaConsultaForm onSubmit={handleConsulta} />
        {empresa && <EmpresaDetalle empresa={empresa} />}
        {empresa && <DeudaPagoForm empresaId={empresa.id} onSubmit={handlePago} />}
      </div>
      <Notification type={notification.type} message={notification.message} onClose={() => setNotification({ type: "", message: "" })} />
    </div>
  );
}
