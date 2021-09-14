<template>
    <div>
        Hello World! <br />
        Counter: {{ counter }} <br />
        <button @click="() => counter++">increase</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            counter: 0,
        };
    },
};
</script>

<style scoped>
button {
    background-color: blue;
}
</style>
