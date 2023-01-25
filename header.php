<!DOCTYPE html>
<html <?php language_attributes(); ?> class="h-full no-js" data-theme="numero">

<?php get_template_part('head'); ?>

<body <?php body_class(); ?>>
    <nav class="bg-white border-b">
      <div class="container">
        <div class="flex h-16 justify-between">
          <div class="flex">
            <div class="flex flex-shrink-0 items-center">
                <svg class="h-8 w-auto" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="20" cy="20" r="20" fill="black"/>
                </svg>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:space-x-8 items-center">
              <ul class="menu horizontal">
                  <li>
                    <a href="#" class="">About</a>
                  </li>
                  <li>
                    <a href="#" class="">Projects</a>
                  </li>
                  <li>
                    <a href="#" class="">Contact</a>
                  </li>
                  <li>
                      <div class="relative inline-block text-left">
                        <div>
                          <button type="button" class="dropdown-toggle" id="menu-button" aria-expanded="true" aria-haspopup="true">
                            Options
                            <!-- Heroicon name: mini/chevron-down -->
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </div>
                      
                        <!--
                          Dropdown menu, show/hide based on menu state.
                      
                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div class="absolute left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                          <div class="p-1" role="none">
                              <ul class="menu dropdown">
                                  <li>
                                      <a href="#">Submen Item 01</a>
                                  </li>
                                  <li>
                                        <a href="#">Submen Item 02</a>
                                    </li>
                                    <li>
                                          <a href="#">Submen Item 03</a>
                                      </li>
                              </ul>
                          </div>
                        </div>
                      </div>
                  </li>
              </ul>
            </div>
          </div>
          <div class="hidden sm:ml-6 sm:flex sm:items-center">
            <ul class="menu horizontal">
                  <li>
                    <a href="#" class="">Imprint</a>
                  </li>
                  <li>
                    <a href="#" class="">Whatever</a>
                  </li>
             </ul>
          </div>
          <div class="-mr-2 flex items-center sm:hidden">
            <!-- Mobile menu button -->
            <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-primary hover:bg-primary-100 hover:text-primary focus:outline-none focus:ring-2 focus:ring-inset focus:ring-focus" aria-controls="mobile-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!--
                Icon when menu is open.
    
                Heroicon name: outline/x-mark
    
                Menu open: "block", Menu closed: "hidden"
              -->
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    
      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="sm:hidden shadow-lg shadow-primary-400/50" id="mobile-menu">
        <div class="space-y-1 pt-2 pb-3">
          <ul class="menu">
                <li>
                  <a href="#" class="">About</a>
                </li>
                <li>
                  <a href="#" class="">Projects</a>
                </li>
                <li>
                  <a href="#" class="">Contact</a>
                </li>
                <li>
                    <div class="relative inline-block text-left">
                      <div>
                        <button type="button" class="btn btn-ghost" id="menu-button" aria-expanded="true" aria-haspopup="true">
                          Options
                          <!-- Heroicon name: mini/chevron-down -->
                          <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                      <div class="pl-5" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="p-1" role="none">
                            <ul class="menu dropdown">
                                <li>
                                    <a href="#">Submen Item 01</a>
                                </li>
                                <li>
                                      <a href="#">Submen Item 02</a>
                                  </li>
                                  <li>
                                        <a href="#">Submen Item 03</a>
                                    </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="border-t border-gray-200 pt-4 pb-3">
          <ul class="menu">
                <li>
                  <a href="#" class="">Imprint</a>
                </li>
                <li>
                  <a href="#" class="">Whatever</a>
                </li>
           </ul>
        </div>
      </div>
    </nav>

    <main class="main-content my-16">
