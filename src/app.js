App = {
  loading: false,
  contracts: {},

  load: async () => {
    await App.loadWeb3()
    await App.loadAccount()
    await App.loadContract()
    await App.render()
  },

  // https://medium.com/metamask/https-medium-com-metamask-breaking-change-injecting-web3-7722797916a8
  loadWeb3: async () => {
    if (typeof web3 !== 'undefined') {
      App.web3Provider = web3.currentProvider
      web3 = new Web3(web3.currentProvider)
    } else {
      window.alert("Please connect to Metamask.")
    }
    // Modern dapp browsers...
    if (window.ethereum) {
      window.web3 = new Web3(ethereum)
      try {
        // Request account access if needed
        await ethereum.enable()
        // Acccounts now exposed
        web3.eth.sendTransaction({/* ... */})
      } catch (error) {
        // User denied account access...
      }
    }
    // Legacy dapp browsers...
    else if (window.web3) {
      App.web3Provider = web3.currentProvider
      window.web3 = new Web3(web3.currentProvider)
      // Acccounts always exposed
      web3.eth.sendTransaction({/* ... */})
    }
    // Non-dapp browsers...
    else {
      console.log('Non-Ethereum browser detected. You should consider trying MetaMask!')
    }
  },

  loadAccount: async () => {
    // Set the current blockchain account
    App.account = web3.eth.accounts[0]
  },

  loadContract: async () => {
    // Create a JavaScript version of the smart contract
    const todoList = await $.getJSON('TodoList.json')
    App.contracts.TodoList = TruffleContract(todoList)
    App.contracts.TodoList.setProvider(App.web3Provider)

    // Hydrate the smart contract with values from the blockchain
    App.todoList = await App.contracts.TodoList.deployed()
  },

  render: async () => {
    // Prevent double render
    if (App.loading) {
      return
    }

    // Update app loading state
    App.setLoading(true)

    // Render Account
    $('#account').html(App.account)

    // Render Tasks
    await App.renderTasks()

    // Update loading state
    App.setLoading(false)
  },

  renderTasks: async () => {
    // Load the total task count from the blockchain
    const Count = await App.todoList.Count()
    console.log(Count);
    const $taskTemplate = $('.taskTemplate')

    // Render out each task with a new task template
    for (var i = 1; i <= Count; i++) {
      // Fetch the task data from the blockchain
      const task = await App.todoList.tasks(i)
      console.log(task);
      const taskId = task[0].toNumber()
      console.log(taskId)
      const uid = task[1]
        console.log(uid)
      const cgpa1 = task[2]
        console.log(cgpa1)
        const cgpa2 = task[3]
        console.log(cgpa2);
        const cgpa3 = task[4]
      console.log(cgpa3);
        const cgpa4 = task[5]
      console.log(cgpa4);
        const report = task[6]
      console.log(report);
        const cert = task[7]
        console.log(cert);

      // Create the html for the task
      const $newTaskTemplate = $taskTemplate.clone()
      $newTaskTemplate.find('.uid').html(uid)
        $newTaskTemplate.find('.cgpa1').html(cgpa1)
        $newTaskTemplate.find('.cgpa2').html(cgpa2)
        $newTaskTemplate.find('.cgpa3').html(cgpa3)
        $newTaskTemplate.find('.cgpa4').html(cgpa4)
        $newTaskTemplate.find('.rc').html(report)
        $newTaskTemplate.find('.cert').html(cert)
      //$newTaskTemplate.find('input')
        //              .prop('id', taskId)
                      //.prop('checked', taskCompleted)
                      //.on('click', App.toggleCompleted)

      // Put the task in the correct list
    //  if (taskCompleted) {
      //  $('#completedTaskList').append($newTaskTemplate)
     // } else {
       // $('#taskList').append($newTaskTemplate)
     // }
        $('#taskList').append($newTaskTemplate)
      // Show the task
      $newTaskTemplate.show()
    }
  },

  createTask: async () => {
      App.setLoading(true)
      const name = $('#uid').val()
      const branch = $('#c1').val()
      const interest = $('#c2').val()
      const cgpa = $('#c3').val()
      const intern = $('#c4').val()
      const tech1 = $('#rc').val()
      const tech2 = $('#cert').val()
      //const tech3 = $('#tech3').val()
      await App.todoList.createTask(name, branch, interest, cgpa,  intern, tech1, tech2)
      window.location.reload()
  },

  toggleCompleted: async (e) => {
      App.setLoading(true)
      const taskId = e.target.name
      await App.todoList.toggleCompleted(taskId)
      window.location.reload()
  },

  setLoading: (boolean) => {
    App.loading = boolean
    const loader = $('#loader')
    const content = $('#content')
    if (boolean) {
      loader.show()
      content.hide()
    } else {
      loader.hide()
      content.show()
    }
  }
}

$(() => {
  $(window).load(() => {
    App.load()
  })
})
