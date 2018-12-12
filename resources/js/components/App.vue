<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-primary">
      <a class="navbar-brand" href="/">
        Manajemen Pegawai
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigasi">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-sm-none">
          <li class="nav-item">
            <router-link class="nav-link text-white"
            :to="{name: 'home'}">Dashboard</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link text-white"
            :to="{name: 'pegawai'}">Data Pegawai</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link text-white"
            :to="{name: 'jabatan'}">Data Jabatan</router-link>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-white"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid h-100">
      <div class="row h-100">
        <nav class="col-md-2 col-sm-3 bg-dark h-100 p-0 position-fixed d-none d-sm-block">
          <ul class="list-group list-group-flush">
            <li class="list-group-item bg-dark">
              <router-link class="nav-link text-white" :to="{name:'home'}">
                Dashboard
              </router-link>
            </li>
            <li class="list-group-item bg-dark">
              <router-link class="nav-link text-white" :to="{name:'pegawai'}">
                Data Pegawai
              </router-link>
            </li>
            <li class="list-group-item bg-dark">
              <router-link class="nav-link text-white" :to="{name:'jabatan'}">
                Data Jabatan
              </router-link>
            </li>
            <li class="list-group-item bg-dark">
              <a href="#" class="nav-link text-white"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Logout</a>
            </li>
          </ul>
        </nav>

        <div class="col-md-10 col-sm-9 offset-md-2 offset-sm-3 mb-3">
          <form action="/logout" id="logout-form" method="post" 
          style="display: none">
            <input type="hidden" name="_token" :value="csrf_token">
          </form>

          <section>
            <transition name="fade">
              <router-view></router-view>
            </transition>  
          </section>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
  .fade-enter-active {
    transition: opacity 1s;
  }    
  .fade-enter {
    opacity: 0;
  }
</style>

<script>
export default {
  data() {
    return {
      csrf_token: window.Laravel.csrfToken
    }
  }
}
</script>
