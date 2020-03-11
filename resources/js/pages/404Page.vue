<template>
  <div id="404">
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
            title: "ບໍ່ພົບເຫັນສິ່ງທີ່ທ່ານຕ້ອງການ",
            subtitle: "ບໍ່ພົບເຫັນສິ່ງທີ່ທ່ານຕ້ອງການເຂົ້າເຖິງ ກະລຸນາກັບໄປໜ້າຫຼັກ..."
        }
    }
}
</script>
