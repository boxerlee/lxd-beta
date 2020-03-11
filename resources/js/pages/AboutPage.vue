<template>
  <div>
    <Herocomponent :title="title"></Herocomponent>
  </div>
</template>
<script>
import Herocomponent from "../components/HeroComponent"

export default {
    components: {
        Herocomponent
    },
    data() {
        return {
            title: "ກ່ຽວກັບພວກເຮົາ",
        }
    }
}
</script>
