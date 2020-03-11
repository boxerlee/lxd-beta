<template>
    <div id="home">
        <Herocomponent :title="title" :subtitle="subtitle" :additionalText="additionalText"></Herocomponent>
    </div>
</template>
<script>
import Herocomponent from "../components/HeroComponent";

export default {
    data() {
        return {
            title: "ບໍລິສັດ ລ້ານຊ້າງ ດິຈິຕອລ ຈໍາກັດ",
            subtitle: "ພວກເຮົາຈໍາໜ່າຍສິນຄ້າດິຈິຕອລທີ່ດີມີຄຸນະພາບແກ່ທ່ານ",
            additionalText: "ຍັງເຮັດບໍ່ແລ້ວໂວ້ຍ!!!"
        }
    },
    components: {
        Herocomponent
    }
}
</script>
