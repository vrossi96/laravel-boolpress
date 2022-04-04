<template>
   <div class="col-6 my-3">
      <div class="card">
         <img v-if="post.img" class="card-img-top" src="#" :alt="post.slug" />
         <div class="card-header bg-dark">
            <h5 class="card-title m-0">{{ post.title }}</h5>
         </div>
         <div class="card-body bg-secondary">
            <p class="card-text">
               {{ post.content }}
            </p>
         </div>
         <div class="card-footer bg-dark">
            <div class="d-flex align-items-center justify-content-between">
               <!-- CATEGORY -->
               <span
                  :style="{
                     'background-color': post.category.color,
                     color: '#fff',
                  }"
                  class="badge badge-pill"
                  >{{ post.category.name }}</span
               >
               <!-- TAGS -->
               <div>
                  <span
                     v-for="tag in post.tags"
                     :style="{ 'background-color': tag.color, color: '#fff' }"
                     :key="tag.id"
                     class="badge badge-pill ml-2"
                     >{{ tag.name }}</span
                  >
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
export default {
   name: "PostCard",
   props: ["post"],
};
</script>

<style lang="scss" scoped>
.card {
   height: 250px;
   color: #fff;
   .badge.badge-pill {
      color: #fff;
      text-transform: uppercase;
   }
}
</style>