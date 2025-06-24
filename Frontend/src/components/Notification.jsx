// src/components/Notification.jsx
import { useEffect } from "react";

export default function Notification({ type, message, onClose }) {
  useEffect(() => {
    if (message) {
      const timeout = setTimeout(onClose, 5000);
      return () => clearTimeout(timeout);
    }
  }, [message, onClose]);

  if (!message) return null;

  const colors = {
    success: "bg-green-100 text-green-800 border-green-300",
    error: "bg-red-100 text-red-800 border-red-300",
  };

  return (
    <div className={`fixed bottom-4 right-4 p-4 rounded-xl border ${colors[type]} shadow-xl`}>
      <p>{message}</p>
    </div>
  );
}
