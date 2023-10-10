<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";

defineProps({
  title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
  router.put(
    route("current-team.update"),
    {
      team_id: team.id,
    },
    {
      preserveState: false,
    }
  );
};

const logout = () => {
  router.post(route("logout"));
};
</script>
<script>
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

export default {
  data() {
    return {
      dashboard: false,
      almacen: false,
      sidebar: true,
      showingNavigationDropdown: ref(false),
    };
  },
  methods: {
    setdashboard() {
      this.dashboard = !this.dashboard;
    },
    setalmacen() {
      this.almacen = !this.almacen;
    },
    setsidebar() {
      this.sidebar = !this.sidebar;
    },
  },
  components: {
    Dropdown,
    DropdownLink,
    Banner,
  },
};
</script>

<template>
  <header class="fixed">
    <Banner />
    <nav>
      <div class="sidebar" v-bind:class="{ close: sidebar }">
        <Link :href="route('pagina.index')"
          class="logo_sidebar text-gray-300 bg-gray-600 transition-all hover:text-white"
        >
          <div class="w-8 ml-2 rounded-full bg-gray-100">
            <img src="./logo_negro.png" class="w-8 p-1" alt="logo" />
          </div>
          <div class="mt-1 ml-3 text-lg font-bold logo_sidebar_text">
            <h1>IGEQ - <span>GALDP</span></h1>
          </div>
        </Link>
        <div class="pages_links">
          <Link
            :href="route('dashboard')"
            class="page_link"
            v-bind:class="{ active: route().current('dashboard') }"
          >
            <i class="bx bxs-dashboard icon_link"></i>
            <div class="link_hidden">
              <span>Dashboard</span>
            </div>
          </Link>
          <!-- usuarios  -->
          <Link
            :href="route('usuarios.index')"
            class="page_link"
            v-bind:class="{ active: route().current('usuarios.index') }"
          >
            <i class="bx bx-log-in icon_link"></i>
            <div class="link_hidden">
              <span>Usuarios</span>
            </div>
          </Link>
          <!-- Tecnicos  -->
          <Link
            :href="route('tecnicos.index')"
            class="page_link"
            v-bind:class="{ active: route().current('tecnicos.index') }"
          >
            <i class="bx bx-user-circle icon_link"></i>
            <div class="link_hidden">
              <span>Tecnicos</span>
            </div>
          </Link>
          <!-- funcionarios  -->
          <Link
            :href="route('funcionarios.index')"
            class="page_link"
            v-bind:class="{ active: route().current('funcionarios.index') }"
          >
            <i class="bx bxs-user-account icon_link"></i>
            <div class="link_hidden">
              <span>Funcionarios</span>
            </div>
          </Link>
          <!-- equipos  -->
          <Link
            :href="route('equipos.index')"
            class="page_link"
            v-bind:class="{ active: route().current('equipos.index') }"
          >
            <i class="bx bx-laptop icon_link"></i>
            <div class="link_hidden">
              <span>Equipos</span>
            </div>
          </Link>
          <!-- dispositivos  -->
          <Link
            :href="route('dispositivos.index')"
            class="page_link"
            v-bind:class="{ active: route().current('dispositivos.index') }"
          >
            <i class="bx bx-devices icon_link"></i>
            <div class="link_hidden">
              <span>Dispositivos</span>
            </div>
          </Link>
          <!-- CITES  -->
          <button class="page_link" @click="setdashboard">
            <i class="bx bx-buildings icon_link"></i>
            <div class="link_hidden">
              <span>CITES</span>
              <i
                class="bx bx-chevron-down icon_down"
                v-bind:class="{ dropdown: dashboard }"
              ></i>
            </div>
          </button>
          <div class="content_hidden" v-show="dashboard">
            <Link
              :href="route('unidades.index')"
              class="dropdown"
              v-bind:class="{
                active_dropdown: route().current('unidades.index'),
              }"
            >
              <i class="bx bx-radio-circle"></i>
              <span>Unidades</span>
            </Link>
            <Link
              :href="route('informes.index')"
              class="dropdown"
              v-bind:class="{
                active_dropdown: route().current('informes.index'),
              }"
            >
              <i class="bx bx-radio-circle"></i>
              <span>Informes</span>
            </Link>
            <Link
              :href="route('notas.index')"
              class="dropdown"
              v-bind:class="{ active_dropdown: route().current('notas.index') }"
            >
              <i class="bx bx-radio-circle"></i>
              <span>Notas</span>
            </Link>
          </div>

          <!-- CATEGORIAS - ARTICULOS  -->
          <button class="page_link" @click="setalmacen">
            <i class="bx bx-package icon_link"></i>
            <div class="link_hidden">
              <span>ALMACEN</span>
              <i
                class="bx bx-chevron-down icon_down"
                v-bind:class="{ dropdown: almacen }"
              ></i>
            </div>
          </button>
          <div class="content_hidden" v-show="almacen">
            <Link
              :href="route('categorias.index')"
              class="dropdown"
              v-bind:class="{
                active_dropdown: route().current('categorias.index'),
              }"
            >
              <i class="bx bx-radio-circle"></i>
              <span>Categorias</span>
            </Link>
            <Link
              :href="route('articulos.index')"
              class="dropdown"
              v-bind:class="{
                active_dropdown: route().current('articulos.index'),
              }"
            >
              <i class="bx bx-radio-circle"></i>
              <span>Articulos</span>
            </Link>
          </div>
          <!-- ingresos  -->
          <Link
            :href="route('ingresos.index')"
            class="page_link"
            v-bind:class="{ active: route().current('ingresos.index') }"
          >
            <i class="bx bx-message-alt-add icon_link"></i>
            <div class="link_hidden">
              <span>Ingresos</span>
            </div>
          </Link>
          <!-- entregas  -->
          <Link
            :href="route('entregas.index')"
            class="page_link"
            v-bind:class="{ active: route().current('entregas.index') }"
          >
            <i class="bx bxs-dock-top icon_link"></i>
            <div class="link_hidden">
              <span>Entregas</span>
            </div>
          </Link>
          <!-- solicitudes  -->
          <Link
            :href="route('solicitudes.index')"
            class="page_link"
            v-bind:class="{ active: route().current('solicitudes.index') }"
          >
            <i class="bx bxs-file-plus icon_link"></i>
            <div class="link_hidden">
              <span>Solicitudes</span>
            </div>
          </Link>
          <!-- soports  -->
          <Link
            :href="route('soportes.index')"
            class="page_link"
            v-bind:class="{ active: route().current('soportes.index') }"
          >
            <i class="bx bx-support icon_link"></i>
            <div class="link_hidden">
              <span>Soportes</span>
            </div>
          </Link>
          <!-- almacenes  -->
          <Link
            :href="route('almacenes.index')"
            class="page_link"
            v-bind:class="{ active: route().current('almacenes.index') }"
          >
            <i class="bx bx-store icon_link"></i>
            <div class="link_hidden">
              <span>Almacen</span>
            </div>
          </Link>
          <!-- prestamos  -->
          <Link
            :href="route('prestamos.index')"
            class="page_link"
            v-bind:class="{ active: route().current('prestamos.index') }"
          >
            <i class="bx bx-credit-card-front icon_link"></i>
            <div class="link_hidden">
              <span>Prestamos</span>
            </div>
          </Link>
          <!-- devoluciones  -->
          <Link
            :href="route('devolucions.index')"
            class="page_link"
            v-bind:class="{ active: route().current('devolucions.index') }"
          >
            <i class="bx bx-dock-bottom icon_link"></i>
            <div class="link_hidden">
              <span>Devoluciones</span>
            </div>
          </Link>
          <!-- repliegues  -->
          <Link
            :href="route('repliegues.index')"
            class="page_link"
            v-bind:class="{ active: route().current('repliegues.index') }"
          >
            <i class="bx bx-folder-minus icon_link"></i>
            <div class="link_hidden">
              <span>Repliegue</span>
            </div>
          </Link>
        </div>

        <a
          class="logo_sidebar_aleph text-gray-300 bg-gray-600 transition-all hover:text-white"
        >
          <div class="w-4 ml-2 flex items-center justify-center">
            <img src="./aleph.png" class="w-full" alt="logo" />
          </div>
          <div class="mt-1 ml-3 text-xs font-bold logo_sidebar_aleph_text">
            <div class="flex flex-col p-0 m-0">
              <span>Harnaldo H. C.</span>
              <span>Aleph | 2023</span>
            </div>
          </div>
        </a>
      </div>
      <div class="main_content" v-bind:class="{ close: sidebar }">
        <div class="flex w-full justify-between items-center navbar">
          <button class="icon_navbar" @click="setsidebar()">
            <i class="bx bx-menu"></i>
          </button>
          <div class="navbar_links">
            <div>
              {{ dashboard }}
            </div>
            <div class="sm:flex sm:items-center sm:ml-6">
              <!-- Settings Dropdown -->
              <div class="ml-3 relative">
                <Dropdown align="right" width="48">
                  <template #trigger>
                    <button
                      v-if="$page.props.jetstream.managesProfilePhotos"
                      class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"
                    >
                      <img
                        class="h-8 w-8 rounded-full object-cover"
                        :src="$page.props.auth.user.profile_photo_url"
                        :alt="$page.props.auth.user.name"
                      />
                    </button>

                    <span v-else class="inline-flex rounded-md">
                      <button
                        type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"
                      >
                        {{ $page.props.auth.user.name }}

                        <svg
                          class="ml-2 -mr-0.5 h-4 w-4"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                          />
                        </svg>
                      </button>
                    </span>
                  </template>

                  <template #content>
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                      Manage Account
                    </div>

                    <DropdownLink :href="route('profile.show')">
                      Profile
                    </DropdownLink>

                    <DropdownLink
                      v-if="$page.props.jetstream.hasApiFeatures"
                      :href="route('api-tokens.index')"
                    >
                      API Tokens
                    </DropdownLink>

                    <div class="border-t border-gray-200" />

                    <!-- Authentication -->
                    <form method="POST" @submit.prevent="logout">
                      <DropdownLink as="button"> Log Out </DropdownLink>
                    </form>
                  </template>
                </Dropdown>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-100 p-4 main_router">
          <main>
            <slot />
          </main>
        </div>
      </div>
    </nav>
  </header>
  <div></div>
</template>
