<template>
  <div>
    <div class="flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>

    <div class="row">
      <div class="card mx-auto">
        <div v-if="showMessage">
          <div class="alert alert-success">{{message}}</div>
        </div>

        <div class="card-header">
          <div class="row">
            <div class="col">
              <form>
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <label class="sr-only" for="inlineFormInput">Name</label>
                    <input
                      type="search"
                      v-model.lazy="search"
                      class="form-control mb-2"
                      placeholder="Search"
                  />
                  </div>
                   <div class="col">
                      <button
                        type="submit"
                        class="btn btn-primary mb-2"
                        >Search
                      </button>
                  </div>
                  <div class="col">
                      <select
                          v-model="selectedDepartment"
                          name="selected_deparment"
                          class="form-control"
                          aria-label="Default select example"
                      >
                          <option
                              v-for="department in departments"
                              :key="department.id"
                              :value="department.id"
                              >{{ department.name }}</option
                          >
                      </select>
                  </div>
                </div>
              </form>
            </div>
            <div>
              <router-link :to="{name:'EmployeesCreate'}" class="btn btn-primary mb-2">Create</router-link>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Address</th>
                <th scope="col">Deparment</th>

                <th scope="col">Manage</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="employee in employees" :key="employee.id">
                <th scope="row">{{employee.id}}</th>
                <td>{{employee.first_name}}</td>
                <td>{{employee.last_name}}</td>
                <td>{{employee.address}}</td>
                <td>{{employee.department_id}}</td>

                <td>
                  <router-link :to="{name:'EmployeesEdit' , params: {id: employee.id}}">Edit</router-link>
                </td>
                <button class="btn btn-danger" @click="deleteEmployee(employee.id)">Delete</button>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      employees: [],
      showMessage: false,
      message: "",
      search: null,
      selectedDepartment: null,
      departments: []
    };
  },

  watch: {
    search() {
      this.getEmployees();
    },
    selectedDepartment() {
      this.getEmployees();
    }
  },

  created() {
    this.getEmployees(), this.getDepartments();
  },

  methods: {
    getEmployees() {
      axios
        .get("/api/employees", {
          params: {
            search: this.search,
            department_id: this.selectedDepartment
          }
        })
        .then(res => {
          this.employees = res.data.data;
          console.log(res.data.data);
        })
        .catch(err => {
          console.log(err);
        });
    },
    deleteEmployee(id) {
      axios.delete("/api/employees/" + id).then(res => {
        this.getEmployees();
        this.message = res.data;
        this.showMessage = true;
        console.log(res);
      });
    },
    getDepartments() {
      axios
        .get("/api/departments")
        .then(res => {
          this.departments = res.data;
          console.log(res.data);
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>

<style>
</style>