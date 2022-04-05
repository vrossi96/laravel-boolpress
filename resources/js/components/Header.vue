<template>
   <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <router-link class="navbar-brand" to="/"
            >Laravel Boolpress</router-link
         >
         <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                  <router-link class="nav-link" :to="{ name: 'home' }"
                     >Posts</router-link
                  >
               </li>
               <li class="nav-item">
                  <router-link class="nav-link" :to="{ name: 'contacts' }"
                     >Contacts</router-link
                  >
               </li>
            </ul>

            <!-- SEARCH -->
            <!-- <form class="form-inline my-2 my-lg-0">
               <input
                  class="form-control mr-sm-2"
                  type="search"
                  placeholder="Search"
                  aria-label="Search"
               />
               <button
                  class="btn btn-outline-success my-2 my-sm-0"
                  type="submit"
               >
                  Search
               </button>
            </form> -->
         </div>
      </nav>
   </div>
</template>

<script>
export default {
   name: "Header",
};
</script>
