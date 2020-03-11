<template>
  <div>
    <Herocomponent :title="title" :subtitle="subtitle"></Herocomponent>
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
            title: "ຕິດຕໍ່ພວກເຮົາ",
            subtitle: "ຊ່ອງທາງໃນການຕິດຕໍ່ພວກເຮົາ"
        }
    }
}
</script>
