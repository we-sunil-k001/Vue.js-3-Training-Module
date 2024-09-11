<template>
    <h3>#Named Slots & Slot Props</h3>
    <div class="card">
        <header>
            <slot name="header">Default Header</slot>
        </header>
        <main>
            <slot name="content">Default Content</slot>
        </main>

        <!-- Slot props - send data from child to parent -->
         <footer>
            <slot name="footer" :itemsCount="items.length">Default Footer</slot>
        </footer>
    </div>
</template>

<script setup>
const items = ['item1', 'item2', 'item3'];
</script>