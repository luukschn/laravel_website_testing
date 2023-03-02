
//SCRIPT PROBABLY HAS TO BE INCLUDED IN public/js/

$document.ready(function(){
  function runScript() {
      // axios.get('/run-script')
      //     .then(response => {
      //         console.log(response.data);
      //     })
      //     .catch(error => {
      //         console.log(error);
      //     });
      // console.log('in script')
      // $.ajax({
      //     url: '/run-script',
      //     type: 'GET',
      //     success: function (response) {
      //         console.log(response);
      //         // document.getElementById("result").innerHTML = response;
      //     },
      //     error: function (error) {
      //         console.log(error);
      //     }
      // })
      alert("Function called");

      document.getElementById("sudoku_gen").onclick = function() {
          document.getElementById("result").innerHTML += "goodbye";
          console.log('element updated');

          fetch('/run-script')
          .then(res => res.json())
          .then(data => {
            console.log(data)
          });
          // .then(data => {
          //     document.getElementById('result').innerHTML(data);
          // });
          
        }
  }

  $("#sudoku-gen").on(runScript);
})