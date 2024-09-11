<template>
    <ol>
       <li> ======ComputedComponent======</li>
       <li>Is Employee present: {{ isEmpPresent }}</li>
       <li>
            <!-- Two-way binding to update employee count -->
           <input v-model="isEmployeePresent" placeholder="Enter 'Yes' or 'No'" />
       </li>
    </ol>
    <!-- In Vue 3, computed properties are used to define reactive, derived values that are automatically re-calculated when their dependencies change. They are cached and only re-evaluated when their dependencies update, making them efficient for expensive operations.

        Key Points:
        Purpose: To compute values based on other reactive data.
        Caching: Computed properties are cached, meaning they won't re-run unless their dependencies change.
        Reactivity: If a reactive value changes, the computed property will automatically update.
        Syntax

        Usage:
        Getter: When you want to compute a value based on other data.
        Setter: When you want to modify related data through the computed property.
    

    -->
</template> 

<script setup>
    import {computed, reactive} from 'vue';

    const employees = reactive(['emp1', 'emp2']);

    const isEmpPresent = computed(()=>{
        return employees.length ? 'Yes Present' : 'No';
    });



    /********************************************
    Reactive employees array: It stores a list of employees.
    Computed isEmpPresent:
    Getter: Checks if employees are present and returns 'Yes Present' if they exist or 'No' otherwise.
    Setter: Modifies the employees array. If the user enters 'Yes', it adds a new employee, and if 'No', it clears the array.
    Two-way binding: The input allows updating the presence of employees directly, modifying the underlying reactive state.

    */
    // Computed property with getter and setter
    const isEmployeePresent = computed({
        get() {
            return employees.length ? 'Yes Present' : 'No';
        },
        set(value) {
            if (value === 'Yes') {
            employees.push(`emp${employees.length + 1}`); // Add an employee
            } else if (value === 'No') {
            employees.length = 0; // Clear all employees
            }
        }
    });
</script>