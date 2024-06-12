<template>
    <button
        class="fop-btn"
        :class="fop_type"
        :style="customStyle"
        :type="type"
    >
        <slot/>
    </button>
</template>
<script setup>
const props = defineProps({
    type:'',
    fop_type:{},
    customStyle:''
})
</script>
<style lang="scss" scoped>
@import "/resources/sass/_variables.scss";

.fop-btn{
    border-radius: 5px;
    padding: 4px 20px;
    background-color: white;
    font-family: revert;
    font-size: 14px;
    font-weight: bold;

    &.primary{

      border: solid $color-primary-0 1px;
      color: $color-primary-2;
      /*box-shadow: 0 1px 6px 0 rgb(187, 187, 187);*/

      transition: 0.2s;

      &:hover{
          background-color: $color-primary-0;
          color: white;
          opacity: 0.7;
      }
      &.hover{
        background-color: $color-primary-0;
        color: white;
        opacity: 0.7;

          &:hover{
              background-color: $color-primary-1;
          }
      }
    }
    &.warning{

        border: solid $color-complement-2 1px;
        color: $color-complement-2;
        /*box-shadow: 0 1px 6px 0 rgb(187, 187, 187);*/

        transition: 0.2s;

        &:hover{
            background-color: $color-complement-2;
            color: white;
            opacity: 0.7;
        }
    }
    /*
    &.delete {
        background-color: #ffffff;
        border: solid #8c8b8b 1px;
        color: $color-text-gray-1;

        transition: 0.2s;

        &:hover{
            background-color: $color-delete;
            color: white;
            opacity: 0.7;
        }

    }

     */
  &.big{
    height: 40px;
    font-size: 16px;
  }
}

.yolo-btn.master{
    margin: 10px;
    text-align: center;
    transition: box-shadow 200ms linear;

    background-size: 200% auto;
    color: white;
    border-radius: 10px;
    border: none;
    padding: 3px 0;
    font-size: 21px;
    font-family: inherit;
    font-weight: bold;
    width: 180px;

    overflow: hidden;
    position: relative;
    box-shadow: 0 5px 15px 0 rgb(187, 187, 187);

}
.yolo-btn.master:hover{
    box-shadow: 0 .5em 1em 0 rgba(0, 0, 0, 0.15), 0 .4em .5em -.4em rgba(0, 0, 0, 0.4);
}

@keyframes slideme {
    0% {
        left: -30px;
        margin-left: 0px;
    }
    30% {
        left: 110%;
        margin-left: 80px;
    }
    100% {
        left: 110%;
        margin-left: 80px;
    }
}

.yolo-btn.master:after {
    content: "";
    position: absolute;
    top: 0;
    left: -200px;
    width: 60px;
    height: 100px;
    background-color: #fff;
    filter: blur(30px);
    transform: skewX(30deg) translateZ(0);
    transition: 1s;
    animation-name: slideme;
    animation-duration: 3s;
    animation-delay: 0.05s;
    animation-timing-function: ease;
    animation-iteration-count: infinite;
}

.master {
    background-color: $color-primary;
}

.master:hover {
    background-color: #dfb020;
}


</style>
