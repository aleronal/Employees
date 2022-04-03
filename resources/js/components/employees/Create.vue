<template>
  <div>
    <div class="flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>

    <div class="row">
      <div class="card mx-auto">
        <div class="card-header">
          Create Employees
          <router-link class="float-right btn btn-primary" :to="{name:'EmployeesIndex'}">Back</router-link>
        </div>
        <div class="card-body">
          <form @submit.prevent="storeEmployee">
            <div class="row mb-3">
              <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
              <div class="col-md-6">
                <input v-model="form.first_name" id="first_name" type="text" class="form-control" name="first_name" required />
              </div>
            </div>
            <div class="row mb-3">
              <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
              <div class="col-md-6">
                <input v-model="form.last_name" id="last_name" type="text" class="form-control" name="last_name" required />
              </div>
            </div>
            <div class="row mb-3">
              <label for="middle_name" class="col-md-4 col-form-label text-md-end">Middle Name</label>
              <div class="col-md-6">
                <input
                  v-model="form.middle_name"
                  id="middle_name"
                  type="text"
                  class="form-control"
                  name="middle_name"
                  required
                />
              </div>
            </div>
            <div class="row mb-3">
              <label for="birth_date" class="col-md-4 col-form-label text-md-end">Birth Date</label>
              <div class="col-md-6">
                <input v-model="form.birth_date" id="birth_date" type="date" class="form-control" name="birth_date" required />
              </div>
            </div>
            <div class="row mb-3">
              <label for="date_hired" class="col-md-4 col-form-label text-md-end">Date Hired</label>
              <div class="col-md-6">
                <datepicker v-model="form.date_hired" input-class="form-control" name="date_hired"></datepicker>
              </div>
            </div>

            <div class="row mb-3">
              <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
              <div class="col-md-6">
                <input v-model="form.address" id="address" type="text" class="form-control" name="address" required />
              </div>
            </div>
            <div class="form-group row mb-3">
              <label for="country" class="col-md-4 col-form-label text-md-end">Country</label>

              <div class="col-md-6">
                <select
                  name="country"
                  v-model="form.country_id"
                  @change="getStates"
                  class="form-control"
                  aria-label="Default select example"
                >
                  <option selected disabled>Select Country</option>

                  <option
                    :value="country.id"
                    v-for="country in countries"
                    :key="country.id"
                  >{{country.name}}</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-3">
              <label for="state" class="col-md-4 col-form-label text-md-end">State</label>

              <div class="col-md-6">
                <select
                  name="state"
                  v-model="form.state_id"
                  @change="getCities"
                  class="form-control"
                  aria-label="Default select example"
                >
                  <option selected disabled>Select State</option>

                  <option :value="state.id" v-for="state in states" :key="state.id">{{state.name}}</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-3">
              <label for="department" class="col-md-4 col-form-label text-md-end">Department</label>

              <div class="col-md-6">
                <select
                  name="department"
                  v-model="form.department_id"
                  class="form-control"
                  aria-label="Default select example"
                >
                  <option selected disabled>Select Department</option>
                  <option
                    v-for="department in departments"
                    :key="department.id"
                    :value="department.id"
                  >{{department.name}}</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-3">
              <label for="city" class="col-md-4 col-form-label text-md-end">City</label>

              <div class="col-md-6">
                <select
                  name="city"
                  v-model="form.city_id"
                  class="form-control"
                  aria-label="Default select example"
                >
                  <option selected disabled>Select State</option>
                  <option :value="city.id" v-for="city in cities " :key="city.id">{{city.name}}</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="zip_code" class="col-md-4 col-form-label text-md-end">Zip Code</label>
              <div class="col-md-6">
                <input v-model="form.zip_code" id="zip_code" type="text" class="form-control" name="zip_code" required />
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Store Employee</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from 'moment';

export default {
  components: {
    Datepicker
  },
  data() {
    return {
      countries: [],
      states: [],
      departments: [],
      cities: [],
      form: {
        first_name: "",
        last_name: "",
        middle_name: "",
        address: "",
        country_id: "",
        state_id: "",
        department_id: "",
        city_id: "",
        zip_code: "",
        birth_date: "",
        date_hired: ""
      }
    };
  },

  created() {
    this.getCountries(), this.getdepartments();
  },

  methods: {
    getCountries() {
      axios
        .get("/api/countries")
        .then(res => {
          this.countries = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getStates() {
      axios
        .get("/api/employees/" + this.form.country_id + "/states")
        .then(res => {
          this.states = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getCities() {
      axios
        .get("/api/employees/" + this.form.state_id + "/cities")
        .then(res => {
          this.cities = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getdepartments() {
      axios
        .get("/api/departments")
        .then(res => {
          this.departments = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    storeEmployee() {
        axios.post("/api/employees", {
            'first_name' : this.form.first_name,
            'last_name' : this.form.last_name,
            'middle_name' : this.form.middle_name,
            'address' : this.form.address,
            'country_id' : this.form.country_id,
            'state_id' : this.form.state_id,
            'city_id' : this.form.city_id,
            'department_id' : this.form.department_id,
            'zip_code' : this.form.zip_code,
            'birthdate' : this.format_date(this.form.birth_date),
            'date_hired' : this.format_date(this.form.date_hired),
        }).then(res => {
            this.$router.push({name:'EmployeesIndex'}); 
            console.log(res);
        })
    },
    format_date(value){
        if(value) {
            return moment(String(value)).format('YYYYMMDD');        
        }
    }
  }
};
</script>

<style scoped>
.card {
  width: 600px;
}
</style>