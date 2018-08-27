(function ($) {

      $( document ).ready(function() {
        var wordliststr = $("#wordlist").val();
        wordliststr_safe = wordliststr.toUpperCase();
        wordliststr_safe = wordliststr_safe.replace(/Á/g, 'A');
        wordliststr_safe = wordliststr_safe.replace(/É/g, 'E');
        wordliststr_safe = wordliststr_safe.replace(/Í/g, 'I');
        wordliststr_safe = wordliststr_safe.replace(/Ó/g, 'O');
        wordliststr_safe = wordliststr_safe.replace(/Ú/g, 'U');
        var words = wordliststr_safe.split("-");

        // start a word find game
        var gamePuzzle = wordfindgame.create(words, '#puzzle', '#words');

        $('#solve').click( function() {
          wordfindgame.solve(gamePuzzle, words);
        });

        // create just a puzzle, without filling in the blanks and print to console
        var puzzle = wordfind.newPuzzle(
          words,
          {height: 10, width:10, fillBlanks: false}
        );
        wordfind.print(puzzle);
      });

})(jQuery);
