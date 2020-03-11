<template>
    <div id="hero">
        <section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 v-if="title" class="title has-text-centered">{{title}}</h1>
                    <h2 v-if="subtitle" class="subtitle has-text-centered">{{subtitle}}</h2>
                    <h3 v-if="additionalText" class="subtitle has-text-centered">{{additionalText}}</h3>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    props: ["title", "subtitle", "additionalText"]
}
</script>
