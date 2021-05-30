<template>
    <div>
        <h6>Filter Country</h6>
        <div class="d-flex  me-3">
        <v-select :options="countriesListArray" class="filter-select" @input="filterCountry"
              placeholder="Choose a country" :model.sync="country"></v-select>
        </div>
    </div>
</template>

<script>
  export default {
    name: "FilterCountry",
      data:() => ({
        country: null,
        countriesList:[
          {
              name: 'USA' ,
              list: [
                  { name: 'Alabama'},
                  { name: 'Alaska'},
                  { name: 'Arizona'},
                  { name: 'Arkansas'},
                  { name: 'California'},
                  { name: 'Colorado'},
                  { name: 'Connecticut'},
                  { name: 'Delaware'},
                  { name: 'Florida'},
                  { name: 'Georgia'},
                  { name: 'Hawaii'},
                  { name: 'Idaho'},
                  { name: 'Illinois'},
                  { name: 'Indiana'},
                  { name: 'Iowa'},
                  { name: 'Kansas'},
                  { name: 'Kentucky'},
                  { name: 'Louisiana'},
                  { name: 'Maine'},
                  { name: 'Maryland'},
                  { name: 'Massachusetts'},
                  { name: 'Michigan'},
                  { name: 'Minnesota'},
                  { name: 'Mississippi'},
                  { name: 'Missouri'},
                  { name: 'Montana'},
                  { name: 'Nebraska'},
                  { name: 'Nevada'},
                  { name: 'New Hampshire'},
                  { name: 'New Jersey'},
                  { name: 'New Mexico'},
                  { name: 'New York'},
                  { name: 'North Carolina'},
                  { name: 'North Dakota'},
                  { name: 'Ohio'},
                  { name: 'Oklahoma'},
                  { name: 'Oregon'},
                  { name: 'Pennsylvania'},
                  { name: 'Rhode Island'},
                  { name: 'South Carolina'},
                  { name: 'South Dakota'},
                  { name: 'Tennessee'},
                  { name: 'Texas'},
                  { name: 'Utah'},
                  { name: 'Vermont'},
                  { name: 'Virginia'},
                  { name: 'Washington'},
                  { name: 'Washington DC'},
                  { name: 'West Virginia'},
                  { name: 'Wisconsin'},
                  { name: 'Wyoming'},
              ]
          },
          {
              name : 'Canada',
              list: [
                  { name: 'Alberta' },
                  { name: 'British Columbia' },
                  { name: 'Manitoba' },
                  { name: 'New Brunswick' },
                  { name: 'Newfoundland' },
                  { name: 'Nova Scotia' },
                  { name: 'Ontario' },
                  { name: 'Quebec' },
                  { name: 'Saskatchewan' },
              ]
          },
          { name: 'Anguilla'},
          { name: 'Antigua' },
          { name: 'Argentina' },
          { name: 'Australia', list: [{ name: 'New South Wales' }, { name: 'Queensland' }, { name: 'South Australia' }, { name: 'Victoria' }, { name: 'Western Australia' },]},
          { name: 'Austria' },
          { name: 'Bahamas' },
          { name: 'Barbados' },
          { name: 'Belarus' },
          { name: 'Belgium' },
          { name: 'Belize' },
          { name: 'Bermuda' },
          { name: 'Brazil' },
          { name: 'British Virgin Islands' },
          { name: 'Bulgaria' },
          { name: 'Cayman Islands' },
          { name: 'Chile' },
          { name: 'China', list: [ { name: 'Hong Kong' }] },
          { name: 'Colombia' },
          { name: 'Curacao' },
          { name: 'Cyprus' },
          { name: 'Czech Republic' },
          { name: 'Denmark' },
          { name: 'Dominican Republic' },
          { name: 'Egypt' },
          { name: 'Faeroe Islands' },
          { name: 'Finland' },
          { name: 'France' },
          { name: 'Germany' },
          { name: 'Ghana' },
          { name: 'Gibraltar' },
          { name: 'Greece' },
          { name: 'Guam' },
          { name: 'Guernsey' },
          { name: 'Hungary' },
          { name: 'India' },
          { name: 'Indonesia' },
          { name: 'Ireland' },
          { name: 'Isle of Man' },
          { name: 'Israel' },
          { name: 'Italy' },
          { name: 'Jamaica' },
          { name: 'Japan' },
          { name: 'Jersey' },
          { name: 'Kazakhstan' },
          { name: 'Korea' },
          { name: 'Lebanon' },
          { name: 'Liechtenstein' },
          { name: 'Lithuania' },
          { name: 'Luxembourg' },
          { name: 'Macau' },
          { name: 'Macedonia, the former Yugoslav Republic of' },
          { name: 'Malaysia' },
          { name: 'Malta' },
          { name: 'Mexico' },
          { name: 'Monaco' },
          { name: 'Mongolia' },
          { name: 'Montenegro' },
          { name: 'Morocco' },
          { name: 'Namibia' },
          { name: 'New Zealand' },
          { name: 'Nigeria' },
          { name: 'Norway' },
          { name: 'Oman' },
          { name: 'Pakistan' },
          { name: 'Panama' },
          { name: 'Papua New Guinea' },
          { name: 'Peru' },
          { name: 'Philippines' },
          { name: 'Poland' },
          { name: 'Portugal' },
          { name: 'Puerto Rico' },
          { name: 'Qatar' },
          { name: 'Romania' },
          { name: 'Russia' },
          { name: 'Saudi Arabia' },
          { name: 'Singapore' },
          { name: 'South Africa' },
          { name: 'Spain' },
          { name: 'Sri Lanka' },
          { name: 'Sweden' },
          { name: 'Switzerland' },
          { name: 'Taiwan' },
          { name: 'Thailand' },
          { name: 'The Netherlands' },
          { name: 'Turkey' },
          { name: 'United Arab Emirates' },
          { name: 'United Kingdom', list: [{ name: 'England' }, { name: 'England and Wales' }, { name: 'Scotland' }, { name: 'Wales' }] },
          { name: 'United Republic of Tanzania' },
          { name: 'Uruguay' },
          { name: 'Venezuela' },
          { name: 'Vietnam' }
      ]
      }),
      computed: {
        countriesListArray(){
            let result = [ ...this.countriesList.map(d => ({ name: d.name })) ];
                result = [ ...result, ...this.countriesList.filter(d => d.list).map(d => d.list).flat()];

            result = result.map(d => d.name);

            return result.sort();
        }
      },
      methods: {
          filterCountry(value){
              return this.$emit('filter-country', value)
          }
      }
  }
</script>

<style scoped>

</style>
