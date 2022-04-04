<template>
  <div>
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">To Email address</label>
        <input
          v-model="form.email"
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          placeholder="Enter email"
        />
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Choose Country</label>
        <select v-model="form.country" class="form-control" id="exampleFormControlSelect1">  
            <option v-for="country in countries" :key="country.id">{{country.name}}</option>
        
          
        </select>
      </div>

      <div class="form-group">
        <label for="title">This will be the Tittle of the message</label>
        <input v-model="form.title" type="text" class="form-control" id="title" placeholder="Title" />
      </div>

      <div class="form-group">
        <label for="message">This will be the Message</label>
        <textarea v-model="form.message" class="form-control" id="message" rows="3"></textarea>
      </div>

      <div class="form-check">
        <input v-model="form.checked" type="checkbox" class="form-check-input" id="exampleCheck1" />
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      countries: [],
      form: {
        to_email: "",
        country: "",
        title: "",
        message: "",
        checked: false
      }
    };
  },

  created() {
    this.getCountry();
  },

  methods: {
    getCountry() {
      axios
        .get("/api/countries")
        .then(res => {
          this.countries = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>

<style scoped>
</style>