<nav class="bg-orange-300 text-orange-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 hover:bg-orange-800 hover:text-orange-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.
            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-auto" src="./img/logo.png" alt="Your Company">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
          <?php
            if(USER){
                ?>
                <a href="#./?s=quizz" class="text-orange-800 hover:bg-orange-800 hover:text-orange-300 rounded-md px-3 py-2 text-sm font-medium">Quizz</a>
                <?php
            }
            ?>
            <a href="#./?s=scores" class="text-orange-800 hover:bg-orange-800 hover:text-orange-300 rounded-md px-3 py-2 text-sm font-medium">Scores</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <?php
        if(USER){
            ?>
            <!-- Profile dropdown -->
            <div class="relative ml-3">
            <div>
                <button type="button" class="relative flex rounded-full bg-orange-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="./img/avatars/Av5.png" alt="">
                </button>
            </div>

            <!-- Menu caché, activer avec un event sur le bouton -->
            <div class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="./?s=account" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">parametres</a>
                <a href="./?dc" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Déconnecter</a>
            </div>
            </div>
            <?php
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-orange-800", Default: "text-orange-800 hover:bg-gray-700 hover:text-orange-800" -->
      <a href="#" class="bg-gray-900 text-orange-800 block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
      <a href="#" class="text-orange-800 hover:bg-orange-700 hover:text-orange-200 block rounded-md px-3 py-2 text-base font-medium">Team</a>
      <a href="#" class="text-orange-800 hover:bg-orange-700 hover:text-orange-200 block rounded-md px-3 py-2 text-base font-medium">Projects</a>
      <a href="#" class="text-orange-800 hover:bg-orange-700 hover:text-orange-200 block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
    </div>
  </div>
</nav>