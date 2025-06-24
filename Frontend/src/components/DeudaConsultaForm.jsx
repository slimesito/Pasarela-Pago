import { useState } from "react";

export default function DeudaConsultaForm({ onSubmit }) {
  const [rif, setRif] = useState("");
  const [id, setId] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault();
    onSubmit({ rif, id });
  };

  return (
    <form onSubmit={handleSubmit} className="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg p-6 space-y-5">
      <div className="flex items-center space-x-2 mb-4">
        <div className="bg-gradient-to-br from-blue-500 to-blue-700 dark:from-blue-600 dark:to-blue-800 h-8 w-8 rounded-lg flex items-center justify-center shadow-md">
          <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
          </svg>
        </div>
        <h2 className="text-xl font-bold text-gray-800 dark:text-white">Consultar Deuda</h2>
      </div>
      
      <div className="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
          <label htmlFor="rif" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">RIF (opcional)</label>
          <input
            type="text"
            id="rif"
            placeholder="J-123456789"
            value={rif}
            onChange={(e) => setRif(e.target.value)}
            className="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition"
          />
        </div>
        <div>
          <label htmlFor="id" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">ID Empresa (opcional)</label>
          <input
            type="text"
            id="id"
            placeholder="123456"
            value={id}
            onChange={(e) => setId(e.target.value)}
            className="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition"
          />
        </div>
      </div>
      
      <button 
        type="submit"
        className="mt-2 w-full md:w-auto bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-medium py-2.5 px-6 rounded-lg shadow-md transition-all duration-300 transform hover:scale-[1.02]"
      >
        Consultar
      </button>
    </form>
  );
}