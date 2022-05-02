import EmployeesIndex from './components/employees/Index.vue'; 
import EmployeesCreate from './components/employees/Create.vue'; 
import EmployeesEdit from './components/employees/Edit.vue'; 
import Tabulator from './components/tabulator/tabulator.vue'

export const routes = [

    {
        path:'/employees', 
        name: 'EmployeesIndex',
        component: EmployeesIndex
    },
    {
        path:'/employees/create',
        name: 'EmployeesCreate',
        component: EmployeesCreate
    },
    {
        path:'/employees/:id',
        name: 'EmployeesEdit',
        component: EmployeesEdit
    },
    {
        path:'/tabulator',
        name: 'tabulator',
        component: Tabulator
    }
    

];