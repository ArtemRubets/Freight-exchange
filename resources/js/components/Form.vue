<template>
<div>
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-2 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="#" method="POST">
                    <div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12">
                                    <label for="load-name" class="block text-sm font-medium text-gray-700">Назва</label>
                                    <input type="text" name="load-name" id="load-name" autocomplete="given-name" class="mt-1 p-2 block border shadow-sm w-full sm:text-sm rounded-md" />
                                </div>

                                <div class="col-span-6">
                                    <label for="from" class="block text-sm font-medium text-gray-700">Звідки</label>
                                    <input type="text" name="from" id="from" autocomplete="family-name" class="mt-1 p-2 block w-full border shadow-sm sm:text-sm rounded-md" />
                                </div>

                                <div class="col-span-6">
                                    <label for="to" class="block text-sm font-medium text-gray-700">Куди</label>
                                    <input type="text" name="to" id="to" autocomplete="email" class="mt-1 p-2 block w-full border shadow-sm sm:text-sm rounded-md" />
                                </div>

                                <div class="col-span-6">
                                    <label for="date-picker" class="block text-sm font-medium text-gray-700">Дата:</label>

                                    <input type="date" id="date-picker" class="mt-1 p-2 block w-full border shadow-sm sm:text-sm rounded-md" name="date-picker"
                                           value="2021-08-20"
                                           min="2021-08-20" max="2022-01-01">
                                </div>

                                <div class="col-span-6">
                                    <label for="weight" class="block text-sm font-medium text-gray-700">Вага</label>
                                    <input type="number" name="weight" id="weight" autocomplete="email" class="mt-1 p-2 block w-full border shadow-sm sm:text-sm rounded-md" />
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "Form"
}
</script>

<style scoped>

</style>
