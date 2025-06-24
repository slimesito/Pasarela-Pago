export default function Navbar({ user, onLogout }) {
  return (
    <header className="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 backdrop-blur-sm bg-opacity-90">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex justify-between items-center">
        <div className="flex items-center space-x-3">
          <div className="bg-gradient-to-br from-blue-500 to-blue-700 dark:from-blue-600 dark:to-blue-800 h-9 w-9 rounded-lg flex items-center justify-center shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
              <path d="M12 12.99v8.94c-3.72-1.15-6.47-4.82-7-8.94h7zm10-1c0 5.16-3.92 9.78-9 10.93-5.08-1.15-9-5.77-9-10.93V5.7l9-4 9 4v6.29z" />
              <path d="M12 12.99v8.94c-3.72-1.15-6.47-4.82-7-8.94h7z" />
            </svg>
          </div>
          <h1 className="text-xl font-bold text-gray-800 dark:text-white tracking-tight">Pasarela de Pago</h1>
        </div>
        
        <div className="flex items-center space-x-6">
          <div className="flex items-center space-x-3">
            <div className="bg-gradient-to-tr from-amber-400 to-amber-600 rounded-full w-8 h-8 flex items-center justify-center text-white font-medium text-sm">
              {user?.name?.charAt(0) || "U"}
            </div>
            <div className="text-right hidden sm:block">
              <p className="text-sm font-medium text-gray-700 dark:text-gray-200">{user?.name}</p>
            </div>
          </div>
          
          <button 
            onClick={onLogout}
            className="flex items-center space-x-1.5 text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 transition-colors duration-200 cursor-pointer group"
          >
            <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 group-hover:translate-x-0.5 transition-transform" viewBox="0 0 20 20" fill="currentColor">
              <path fillRule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clipRule="evenodd" />
            </svg>
            <span className="hidden md:inline">Cerrar sesión</span>
          </button>
        </div>
      </div>
    </header>
  );
}