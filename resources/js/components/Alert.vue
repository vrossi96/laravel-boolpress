<template>
   <div :class="`alert alert-${type || 'danger'}`" role="alert">
      <div>
         <slot></slot>
      </div>
   </div>
</template>

<script>
export default {
   name: "Alert",
   props: ["type"],
};
</script>

<style>
</style>