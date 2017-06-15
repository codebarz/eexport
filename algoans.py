def is_isogram(word):
    if type(word) != str:
        raise TypeError('Argument should be a string')

    elif word == " ":
      return (word, False)
    else:
        word = word.lower()
        for char in word:
            if word.count(char) > 1:
                return (word, False)
            else:
                return (word, True) 

def my_sort(numbers):
    odd  = [n for n in numbers if n % 2 != 0]
    even = [n for n in numbers if n % 2 == 0]
    return sorted(odd) + sorted(even)

def power(a,b):
    if b == 0:
      return 1
    else:
      return eval(((str(a)+"*")*b)[:-1])

def remove_duplicates(string):
  new_string = "".join(sorted(set(string)))
  if new_string:
      return (new_string, len(string)-len(new_string))
  else:
      return "Please provide only alphabets"

# function longest(str) {
#     if(typeof str !== 'string') return '';
#     var words = str.split(' ');
#     var longest = '';

#     for (var i = 0; i < words.length; i++) {
#       if (words[i].length > longest.length) {
#         longest = words[i];
#       }
#     }
#     return longest;
# }