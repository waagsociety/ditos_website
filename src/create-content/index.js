'use strict'
const fs = require('fs')
const data = require('./data/3.js')

const partners = {
  "Kersnikova": "",
  "UCL": "",
  "WAAG": "",
  "ECSA": "",
  "Meritum": "",
  "RBINS": "",
}

function stringToHash(value) {
  return value.replace(/\W+/g, ' ').trim().replace(/\W+/g, '-').toLowerCase()
}

function padStart(padding) {
  const length = padding.length
  return value => padding.substring(0, length - value.toString().length) + value
}

function dateMethod(item) {
  const day = parseInt(item["Start Day"])
  const month = parseInt(item["Month"])
  const year = parseInt(item["Year"])
  if (!isNaN(day) && !isNaN(month) && !isNaN(year)) {
    return [year, datePadding(month), datePadding(day)].join('-')
  }
}

const datePadding = padStart("00")

const createHash = (cache => {

  const pool = 'bcdfghjklmnpqrstvwxzbcdfghjklmnpqrstvwxz'
  const size = pool.length
  
  return (length, prefix) => {
    
    let hash = []
    let index = -1
    let last = ""
    let next = ""
    while (!hash.length && !cache[hash]) {
      while (index < length) {
        next = pool[Math.floor(Math.random() * size)]
        if (next != last) hash[index++] = next
        last = next
      }
      hash = hash.join('')
      cache[hash] = true
    }
    return prefix ? [prefix, hash].join('-') : hash

  }

})({})

const transform = data => ({
  "Title": {
    method(item) {
      return item["Name of event"]
    },
  },
  "Partner": {
    method(item) {

      const map = {
        "ECSA": 'ecsa',
        "eutema": 'eutema',
        "Kersnikova": 'kersnikova',
        "Medialab Pardo": 'medialab-prado',
        "Meritum": 'meritum',
        "RBINS": 'institut-royal-des-sciences-naturelles-de-belgique',
        "Tekiu": 'tekiu',
        "UCL": 'ucl',
        "UNIGE": 'unige',
        "UPD": 'universite-paris-descartes',
        "WAAG": 'waag-society',
      }

      const name = item["Partner Name"]
      return map[name]

    },
  },
  "Event-name": {
    method(item) {
      return item["Name of event"]
    },
  },
  "Doa-description": {
    method(item) {
      return item["DoA Description (for events that are in the Grant Agreement DoA; if not in DoA complete the next column NOT this one)"]
    },
  },
  "Alt-description": {
    method(item) {
      return item["Brief Description (for events/details not in DoA)"]
    },
  },
  "Status": {
    field: "Status",
    method(item) {
      return item["Status"]
    },
  },
  "Activity": {
    method(item) {
      const map = {
        "Workshop": 'workshop',
        "Discussion/cafe/screenings": 'discussion',
        "Conference/seminar": 'seminar',
        "Exhibition": 'exhibition',
        "Online engagement": 'online',
        "Gaming online": 'online',
      }
      const value = item["Event type"]
      return map[value]
    },
  },
  "Date": {
    method: dateMethod,
  },
  "Date-end": {
    method: dateMethod,
  },
  "Audience-numbers": {
    method(item) {
      const value = parseInt(item["Audience Numbers"])
      if (!isNaN(value)) return value
    },
  },
  "Female-percentile": {
    method(item) {
      const value = parseInt(item["% Female"])
      if (!isNaN(value)) return value
    },
  },
  "Work-package": {
    method(item) {
      return item["Work package"]
    },
  },
  "Facilitator": {
    method(item) {
      return item["Partner org. name AND facilitator's (person) name"]
    },
  },
  "Lower-age-bracket": {
    method(item) {
      const value = item["Participant Age bracket"].split('-')[0]
      const int = value && parseInt(value)
      if (!isNaN(int)) return int
    },
  },
  "Higher-age-bracket": {
    method(item) {
      const value = item["Participant Age bracket"].split('-')[1]
      const int = value && parseInt(value)
      if (!isNaN(int)) return int
    },
  },
  "Funds-eur": {
    method(item) {
      const value = parseInt(item["Total funding amount used (in EUR)"])
      if (!isNaN(value)) return value
    },
  },
  "Event-id": {
    method(item) {
      return item["Event ID (use org.name_date in YYYYMMDD format)"]
    },
  },
  "Reporting-period": {
    method(item) {
      const map = {
        "Reporting Period 1 (M1 - M15)":  "1 (M1 - M15)",
        "Reporting Period 2 (M16-M36)": "2 (M16 - M36)",
      }
      const value = item["Reporting Period"]
      return map[value]
    },
  },
  "Duration": {
    method(item) {
      return item["Event duration"]
    },
  },
  "Planning-phase": {
    method(item) {
      const map = {
        "Scoping (M1-M6)": "Scoping (M1 - M6)",
        "Engagement (M7-M24)": "Engagement (M7 - M24)",
        "Scaling up (M25-M36)": "Scaling up (M25 - M36)"
      }
      const value = item["Phase (the event was planned)"]
      return map[value]
    },
  },
  "Notes": {
    method(item) {
      return item["Notes"]
    },
  },
  "Link": {
    method(item) {
      const urls = [item["URL"], item["URL (2)"], item["URL (3)"]]
        .filter(url => !!url.trim())
        .map(url => "\n-\n  url: >\n    " + url + "\n  label: More information")
      return urls
    },
  }
})

const transformer = transform(data)
const keys = Object.keys(transformer)

const normalised = data

  // map valid data to kirby fields
  .map(item => keys.reduce((result, key, index) => {
    const value = transformer[key].method(item)
    const clean = value && ("" + value).trim()
    if (clean) result[key] = value
    return result
  }, {}))

  // remove items without a title
  .filter(item => "Title" in item)
  // create a hash for each item
  .map(item => {
    return {
      hash: [stringToHash(item.Title), createHash(5)].join('_'),
      text: Object.keys(item).map(field => {
        return field + ': ' + item[field]
      }).join("\n\n----\n\n")
    }
  })

  // .reduce((result, item, index) => {
  //   const field = "Notes"
  //   const key = field in item && item[field]
  //   if (key) result[key] = true
  //   return result
  // }, {})

  // .slice(0, 25)

// console.log(JSON.stringify(normalised, null, 2))

if (1) normalised.forEach(event => {
  const path = ['content', event.hash].join('/')
  if (!fs.existsSync(path)) fs.mkdirSync(path)

  const file = [path, 'event-item.txt'].join('/')
  
  fs.writeFile(file, event.text, function(error) {
    if (error) console.log(error)
  })

})

