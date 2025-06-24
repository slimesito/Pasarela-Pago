import { useState } from "react";

export default function DeudaPagoForm({ empresaId, onSubmit }) {
  const [monto_pago, setMonto] = useState("");
  const [referencia, setReferencia] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault();
    onSubmit({ empresa_id: empresaId, monto_pago, referencia });
    setMonto("");
    setReferencia("");
  };

  return (
    <form onSubmit={handleSubmit} className="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg p-6 space-y-5">
      <div className="flex items-center space-x-2 mb-4">
        <div className="bg-gradient-to-br from-green-500 to-green-700 dark:from-green-600 dark:to-green-800 h-8 w-8 rounded-lg flex items-center justify-center shadow-md">
          <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </div>
        <h2 className="text-xl font-bold text-gray-800 dark:text-white">Realizar Pago</h2>
      </div>
      
      <div className="space-y-4">
        <div>
          <label htmlFor="monto" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Monto a pagar</label>
          <input
            type="number"
            id="monto"
            placeholder="0.00"
            value={monto_pago}
            onChange={(e) => setMonto(e.target.value)}
            required
            step="0.01"
            min="0.01"
            className="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white transition"
          />
        </div>
        <div>
          <label htmlFor="referencia" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Referencia del pago</label>
          <input
            type="text"
            id="referencia"
            placeholder="Número de referencia"
            value={referencia}
            onChange={(e) => setReferencia(e.target.value)}
            required
            className="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white transition"
          />
        </div>
      </div>
      
      <button 
        type="submit"
        className="mt-2 w-full md:w-auto bg-gradient-to-r from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 text-white font-medium py-2.5 px-6 rounded-lg shadow-md transition-all duration-300 transform hover:scale-[1.02]"
      >
        Realizar Pago
      </button>
    </form>
  );
}