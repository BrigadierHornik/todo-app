<template>
    <PageLayout>

    </PageLayout>
</template>

<script>
import axios from 'axios';
import PageLayout from '../Layouts/PageLayout.vue';

export default {
    name: 'Logout',
    components: {
        PageLayout
    },
    mounted() {
        axios.get('/api/logout')
            .then(() => {
                window.location.href = '/';
            });
    },
}


</script>