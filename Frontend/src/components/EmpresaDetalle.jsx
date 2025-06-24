export default function EmpresaDetalle({ empresa }) {
  // Función para formatear la deuda de manera segura
  const formatDeuda = (deuda) => {
    if (!deuda || deuda.deuda_total === undefined || deuda.deuda_total === null) {
      return "Sin deuda";
    }
    const amount = Number(deuda.deuda_total);
    return isNaN(amount) ? "Dato inválido" : `$${amount.toLocaleString('es-VE', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
  };

  return (
    <div className="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg p-6">
      <div className="flex items-center space-x-2 mb-5">
        <div className="bg-gradient-to-br from-green-500 to-green-700 dark:from-green-600 dark:to-green-800 h-8 w-8 rounded-lg flex items-center justify-center shadow-md">
          <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
        </div>
        <h2 className="text-xl font-bold text-gray-800 dark:text-white">Datos de la Empresa</h2>
      </div>
      
      <div className="space-y-3">
        <div className="flex flex-wrap items-center border-b border-gray-100 dark:border-gray-700 py-3">
          <span className="w-full md:w-1/3 text-gray-600 dark:text-gray-400">Nombre:</span>
          <span className="w-full md:w-2/3 font-medium text-gray-800 dark:text-white">{empresa.nombre}</span>
        </div>
        <div className="flex flex-wrap items-center border-b border-gray-100 dark:border-gray-700 py-3">
          <span className="w-full md:w-1/3 text-gray-600 dark:text-gray-400">RIF:</span>
          <span className="w-full md:w-2/3 font-medium text-gray-800 dark:text-white">{empresa.rif}</span>
        </div>
        <div className="flex flex-wrap items-center py-3">
          <span className="w-full md:w-1/3 text-gray-600 dark:text-gray-400">Deuda:</span>
          <span className={`w-full md:w-2/3 font-bold ${formatDeuda(empresa.deuda).includes('Sin deuda') ? 'text-green-600' : 'text-red-600'}`}>
            {formatDeuda(empresa.deuda)}
          </span>
        </div>
      </div>
    </div>
  );
}