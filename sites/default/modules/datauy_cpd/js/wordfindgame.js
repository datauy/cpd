/**
* Wordfind.js 0.0.1
* (c) 2012 Bill, BunKat LLC.
* Wordfind is freely distributable under the MIT license.
* For all details and documentation:
*     http://github.com/bunkat/wordfind
*/

(function (document, $, wordfind) {

  'use strict';

  /**
  * An example game using the puzzles created from wordfind.js. Click and drag
  * to highlight words.
  *
  * WordFindGame requires wordfind.js and jQuery.
  */

  /**
  * Initializes the WordFindGame object.
  *
  * @api private
  */
  var WordFindGame = function() {

    // List of words for this game
    var wordList;

    /**
    * Draws the puzzle by inserting rows of buttons into el.
    *
    * @param {String} el: The jQuery element to write the puzzle to
    * @param {[[String]]} puzzle: The puzzle to draw
    */
    var drawPuzzle = function (el, puzzle) {

      var output = '';
      // for each row in the puzzle
      for (var i = 0, height = puzzle.length; i < height; i++) {
        // append a div to represent a row in the puzzle
        var row = puzzle[i];
        output += '<div>';
        // for each element in that row
        for (var j = 0, width = row.length; j < width; j++) {
            // append our button with the appropriate class
            output += '<button type="button" class="puzzleSquare" x="' + j + '" y="' + i + '">';
            output += row[j] || '&nbsp;';
            output += '</button>';
        }
        // close our div that represents a row
        output += '</div>';
      }

      $(el).html(output);
    };

    /**
    * Draws the words by inserting an unordered list into el.
    *
    * @param {String} el: The jQuery element to write the words to
    * @param {[String]} words: The words to draw
    */
    var drawWords = function (el, words) {

      var output = '<ul>';
      for (var i = 0, len = words.length; i < len; i++) {
        var word = words[i];
        output += '<li class="word ' + word + '">' + word;
      }
      output += '</ul>';

      $(el).html(output);
    };


    /**
    * Game play events.
    *
    * The following events handle the turns, word selection, word finding, and
    * game end.
    *
    */

    // Game state
    var startSquare, selectedSquares = [], curOrientation, curWord = '';

    /**
    * Event that handles mouse down on a new square. Initializes the game state
    * to the letter that was selected.
    *
    */
    var touchMobile = function () {
      console.log("touchMobile");
      console.log("PREVIOUS STARTSQUARE:")
      console.log(startSquare);
      //$(this).addClass('selected');
      var selected = false;
      if(startSquare==null){
        $('.selected').removeClass('selected');
        $(this).addClass('selected');
        startSquare = this;
        selectedSquares.push(this);
        curWord = $(this).text();
      }else{
        selected = selectMobile(this);
      }
      if(selected){
        console.log("STARTSQUARE:")
        console.log(startSquare);
        console.log("SELECTED SQUARES:")
        console.log(selectedSquares);
        console.log("LENGHT:")
        console.log(selectedSquares.length);
        console.log("CURWORD:")
        console.log(curWord);
        if(selectedSquares.length==6){
          console.log("Termina turno por cantidad de letras")
          endTurn();
        }else{
          checkIfEndTurn(this);
        }
      }
    };

    var startTurn = function(obj) {
      $(obj).addClass('selected');
      startSquare = obj;
      selectedSquares.push(obj);
      curWord = $(obj).text();
    };



    /**
    * Event that handles mouse over on a new square. Ensures that the new square
    * is adjacent to the previous square and the new square is along the path
    * of an actual word.
    *
    */
    var selectMobile = function (target) {
      // if the user hasn't started a word yet, just return
      if (!startSquare) {
        return false;
      }

      // if the new square is actually the previous square, just return
      var lastSquare = selectedSquares[selectedSquares.length-1];
      if (lastSquare == target) {
        $('.selected').removeClass('selected');
        startSquare = null;
        selectedSquares = [];
        curWord = '';
        curOrientation = null;
        return false;
      }



      // see if the user backed up and correct the selectedSquares state if
      // they did
      var backTo;
      for (var i = 0, len = selectedSquares.length; i < len; i++) {
        if (selectedSquares[i] == target) {
          backTo = i+1;
          console.log("TARGET:")
          console.log(target);
          console.log(backTo)
          break;
        }
      }

      while (backTo < selectedSquares.length) {
        $(selectedSquares[selectedSquares.length-1]).removeClass('selected');
        selectedSquares.splice(backTo,1);
        curWord = curWord.substr(0, curWord.length-1);
      }


      // see if this is just a new orientation from the first square
      // this is needed to make selecting diagonal words easier
      var newOrientation = calcOrientation(
          $(startSquare).attr('x')-0,
          $(startSquare).attr('y')-0,
          $(target).attr('x')-0,
          $(target).attr('y')-0
          );

      if (newOrientation) {
        selectedSquares = [startSquare];
        curWord = $(startSquare).text();
        if (lastSquare !== startSquare) {
          $(lastSquare).removeClass('selected');
          lastSquare = startSquare;
        }
        curOrientation = newOrientation;
      }

      // see if the move is along the same orientation as the last move
      var orientation = calcOrientation(
          $(lastSquare).attr('x')-0,
          $(lastSquare).attr('y')-0,
          $(target).attr('x')-0,
          $(target).attr('y')-0
          );

      // if the new square isn't along a valid orientation, just ignore it.
      // this makes selecting diagonal words less frustrating
      if (!orientation) {
        console.log("Salio por problema en orientation");
        return false;
      }

      // finally, if there was no previous orientation or this move is along
      // the same orientation as the last move then play the move
      if (!curOrientation || curOrientation === orientation) {
        curOrientation = orientation;
        playTurn(target);
        return true;
      }
      return false;
    };

    var select = function (target) {
      // if the user hasn't started a word yet, just return
      if (!startSquare) {
        return;
      }

      // if the new square is actually the previous square, just return
      var lastSquare = selectedSquares[selectedSquares.length-1];
      if (lastSquare == target) {
        return;
      }



      // see if the user backed up and correct the selectedSquares state if
      // they did
      var backTo;
      for (var i = 0, len = selectedSquares.length; i < len; i++) {
        if (selectedSquares[i] == target) {
          backTo = i+1;
          break;
        }
      }

      while (backTo < selectedSquares.length) {
        $(selectedSquares[selectedSquares.length-1]).removeClass('selected');
        selectedSquares.splice(backTo,1);
        curWord = curWord.substr(0, curWord.length-1);
      }


      // see if this is just a new orientation from the first square
      // this is needed to make selecting diagonal words easier
      var newOrientation = calcOrientation(
          $(startSquare).attr('x')-0,
          $(startSquare).attr('y')-0,
          $(target).attr('x')-0,
          $(target).attr('y')-0
          );

      if (newOrientation) {
        selectedSquares = [startSquare];
        curWord = $(startSquare).text();
        if (lastSquare !== startSquare) {
          $(lastSquare).removeClass('selected');
          lastSquare = startSquare;
        }
        curOrientation = newOrientation;
      }

      // see if the move is along the same orientation as the last move
      var orientation = calcOrientation(
          $(lastSquare).attr('x')-0,
          $(lastSquare).attr('y')-0,
          $(target).attr('x')-0,
          $(target).attr('y')-0
          );

      // if the new square isn't along a valid orientation, just ignore it.
      // this makes selecting diagonal words less frustrating
      if (!orientation) {
        return;
      }

      // finally, if there was no previous orientation or this move is along
      // the same orientation as the last move then play the move
      if (!curOrientation || curOrientation === orientation) {
        curOrientation = orientation;
        playTurn(target);
      }

    };

    var touchMove = function(e) {
      console.log("Movio el touch");
      console.log(e);
      e.preventDefault();
      var xPos = e.originalEvent.touches[0].pageX;
      var yPos = e.originalEvent.touches[0].pageY;
      var targetElement = document.elementFromPoint(xPos, yPos);
      console.log(targetElement);
      if(targetElement && targetElement.classList.contains("puzzleSquare")){
        select(targetElement);
      }
    };


    var isMobile = function() {
      var check = false;
      (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
      return check;
    };

    var mouseMoveOnlyForPc = function(){
      console.log("MOVE ONLY FOR PC");
      if(!isMobile()){
        mouseMove(this);
      }
    }

    var endTurnOnlyForPC = function(){
      console.log("END TURN ONLY FOR PC");
      if(!isMobile()){
        endTurn();
      }
    }

    var startTurnOnlyForPc = function(){
      console.log("Start TURN ONLY FOR PC");
      if(!isMobile()){
        startTurn(this);
      }
    }

    var mouseMove = function(obj) {
      select(obj);
    };

    /**
    * Updates the game state when the previous selection was valid.
    *
    * @param {el} square: The jQuery element that was played
    */
    var playTurn = function (square) {

      // make sure we are still forming a valid word
      //for (var i = 0, len = wordList.length; i < len; i++) {
        //if (wordList[i].indexOf(curWord + $(square).text()) === 0) {
          $(square).addClass('selected');
          selectedSquares.push(square);
          curWord += $(square).text();
          //break;
        //}
      //}
    };

    /**
    * Event that handles mouse up on a square. Checks to see if a valid word
    * was created and updates the class of the letters and word if it was. Then
    * resets the game state to start a new word.
    *
    */
    var checkIfEndTurn = function(obj){
      console.log("CHECK IF END TURN");
      console.log(obj);

      // see if we formed a valid word
      var foundWord = false;
      for (var i = 0, len = wordList.length; i < len; i++) {
        if (wordList[i] === curWord) {
          foundWord = true;
          $('.selected').addClass('found');
          wordList.splice(i,1);
          $('.' + curWord).addClass('wordFound');
        }
        if (wordList.length === 0) {
          $('.puzzleSquare').addClass('complete');
          $("[name='form_resultado_sopadeletras']").val(1);
          $("#edit-next").click();
        }
      }
      if(foundWord==true){
        // reset the turn
        $('.selected').removeClass('selected');
        startSquare = null;
        selectedSquares = [];
        curWord = '';
        curOrientation = null;
        $(obj).removeClass('selected');
      }
    };

    var endTurnFake = function(){
      console.log("End turn FAKE");
    };

    var endTurn = function () {
      console.log("END TURN");
      // see if we formed a valid word
      for (var i = 0, len = wordList.length; i < len; i++) {
        if (wordList[i] === curWord) {
          $('.selected').addClass('found');
          wordList.splice(i,1);
          $('.' + curWord).addClass('wordFound');
        }
        if (wordList.length === 0) {
          $('.puzzleSquare').addClass('complete');
          $("[name='form_resultado_sopadeletras']").val(1);
          $("#edit-next").click();
        }
      }
      // reset the turn
      $('.selected').removeClass('selected');
      startSquare = null;
      selectedSquares = [];
      curWord = '';
      curOrientation = null;
    };

    /**
    * Given two points, ensure that they are adjacent and determine what
    * orientation the second point is relative to the first
    *
    * @param {int} x1: The x coordinate of the first point
    * @param {int} y1: The y coordinate of the first point
    * @param {int} x2: The x coordinate of the second point
    * @param {int} y2: The y coordinate of the second point
    */
    var calcOrientation = function (x1, y1, x2, y2) {

      for (var orientation in wordfind.orientations) {
        var nextFn = wordfind.orientations[orientation];
        var nextPos = nextFn(x1, y1, 1);

        if (nextPos.x === x2 && nextPos.y === y2) {
          return orientation;
        }
      }

      return null;
    };

    return {

      /**
      * Creates a new word find game and draws the board and words.
      *
      * Returns the puzzle that was created.
      *
      * @param {[String]} words: The words to add to the puzzle
      * @param {String} puzzleEl: Selector to use when inserting the puzzle
      * @param {String} wordsEl: Selector to use when inserting the word list
      * @param {Options} options: WordFind options to use when creating the puzzle
      */
      create: function(words, puzzleEl, wordsEl, options) {

        wordList = words.slice(0).sort();

        var puzzle = wordfind.newPuzzle(words, options);

        // draw out all of the words
        drawPuzzle(puzzleEl, puzzle);
        drawWords(wordsEl, wordList);

        // attach events to the buttons
        // optimistically add events for windows 8 touch
        if (window.navigator.msPointerEnabled) {
          $('.puzzleSquare').on('MSPointerDown', touchMobile);
          /*$('.puzzleSquare').on('MSPointerOver', select);
          $('.puzzleSquare').on('MSPointerUp', endTurn);*/
        }
        else {
          $('.puzzleSquare').mousedown(startTurnOnlyForPc);
          $('.puzzleSquare').mouseenter(mouseMoveOnlyForPc);
          $('.puzzleSquare').mouseup(endTurnOnlyForPC);
          $('.puzzleSquare').on("touchstart", touchMobile);
          //$('.puzzleSquare').on("touchmove", touchMove);
          //$('#puzzle').on("touchmove", touchMove);
          //$('.puzzleSquare').on("touchend", endTurnFake);
        }

        return puzzle;
      },

      /**
      * Solves an existing puzzle.
      *
      * @param {[[String]]} puzzle: The puzzle to solve
      * @param {[String]} words: The words to solve for
      */
      solve: function(puzzle, words) {

        var solution = wordfind.solve(puzzle, words).found;

        for( var i = 0, len = solution.length; i < len; i++) {
          var word = solution[i].word,
              orientation = solution[i].orientation,
              x = solution[i].x,
              y = solution[i].y,
              next = wordfind.orientations[orientation];

          if (!$('.' + word).hasClass('wordFound')) {
            for (var j = 0, size = word.length; j < size; j++) {
              var nextPos = next(x, y, j);
              $('[x="' + nextPos.x + '"][y="' + nextPos.y + '"]').addClass('solved');
            }

            $('.' + word).addClass('wordFound');
          }
        }

      }
    };
  };


  /**
  * Allow game to be used within the browser
  */
  window.wordfindgame = WordFindGame();

}(document, jQuery, wordfind));
