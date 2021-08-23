<template>
    <div class="my-3">
        <div v-for="item in mydatas">
            <div class="tab__header">
                <a href="#" class="tab__link mb-1 p-4 block bg-gray-300 hover:bg-blue-500 hover:text-white no-underline text-gray-700 flex justify-between rounded" @click.prevent="active = !active">
                    <strong>{{ item.id }}, {{ item.name }}
                    </strong>
                    <span class="text-gray-200" v-show="!active">&#10133;</span>
                    <span class="text-gray-200" v-show="active">&#10134;</span>
                </a>
            </div>
            <div class="tab__content p-2" v-show="active"><slot />
                {{ item.text }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Accordion",
    props: [
        'title'
    ],
    data() {
        return {
            active: false,
            mydatas: [
                { id: 1, name: 'one', text: 'Lorem'},
                { id: 2, name: 'two', text: 'Ipsum'},
                { id: 3, name: 'three', text: 'Yea...'}
            ]
        }
    },
}

</script>

<style scoped>

</style>
