<div class="relative lg:h-screen md:h-screen xl:h-screen flex" id="login">
  <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
    <div class="sm:w-1/2 xl:w-2/5 h-full hidden md:flex flex-auto items-center justify-start p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative" style="background-image: url(https://images.unsplash.com/photo-1579451861283-a2239070aaa9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80);">
      <div class="absolute bg-gradient-to-b from-gray-400 to-gray-900 opacity-75 inset-0 z-0"></div>
      <div class="absolute triangle  min-h-screen right-0 w-16"></div>
      <img src="assets/images/audifonos.png" class="h-96 absolute right-5 mr-5">
      <div class="w-1/3  max-w-md z-10">
        <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6">Control de Gastos</div>
        <div class="sm:text-sm xl:text-md text-gray-200 font-normal">
          <p>Controla tus gastos de forma eficiente y segura.</p>
          <p>Registra tus gastos y obten reportes detallados.</p>
        </div>
      </div>
      <!---remove custom style-->
      <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
    <div class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full xl:w-2/5 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-white ">
      <div class="max-w-md w-full space-y-8">
        <div class="text-center">
          <h2 class="mt-6 text-3xl font-bold text-gray-900">
            Hola Bienvenido!
          </h2>
          <p class="mt-2 text-sm text-gray-500">Por favor inicie sesión en su cuenta</p>
        </div>

        <div class="flex items-center justify-center space-x-2">
          <span class="h-px w-16 bg-gray-200"></span>
          <span class="text-gray-300 font-normal">ingresar credenciales</span>
          <span class="h-px w-16 bg-gray-200"></span>
        </div>

        <div class="mt-8 space-y-6">
          <div class="mt-8 content-center">
            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
              Correo
            </label>
            <input id="correolg" class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-gray-500" type="email" placeholder="mail@gmail.com">
          </div>
          <div class="relative">
            <div class="absolute right-3 mt-4" id="showPassword">
              <svg class="w-6 h-6 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
              </svg>
            </div>
            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Contraseña</label>
            <input class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-gray-500" type="password" id="password" placeholder="Ingrese contraseña">
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 bg-gray-100 border-gray-300 focus:ring-gray-400 rounded">
              <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                Recuerdame
              </label>
            </div>
            <div class="text-sm">
              <a href="#" class="text-gray-400 hover:text-gray-500">
                Olvidaste tu contraseña?
              </a>
            </div>
          </div>
          <div>
            <button id="btnLogin" type="button" class="w-full flex justify-center bg-gradient-to-r from-gray-400 to-gray-900  hover:bg-gradient-to-l hover:from-gray-500 hover:to-black text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer">
              Iniciar Sesión
            </button>
          </div>
          <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
            <span>No tienes cuenta?</span>
            <a type="button" onclick="cambiarFormulario()" class="text-gray-400 hover:text-gray-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">Registrarse</a>
          </p>
        </div>

      </div>
    </div>
  </div>
</div>