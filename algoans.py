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

class ShoppingCart(object):
    
  def __init__(self):
      self.total = 0 
      self.items = {}

  def add_item(self,item_name,quantity,price):
      self.items[item_name] = quantity
      self.total += price*quantity

  def remove_item(self,item_name,quantity,price):
      if quantity < self.items[item_name] and quantity >= 0:
          self.total -= price*quantity
          self.items[item_name] -= quantity
#       elif quantity >= self.items[item_name] :
#           del self.items[item_name]
      else:
          self.total -= price*self.items[item_name]
          del self.items[item_name]

  def checkout(self,cash_paid):
      if cash_paid >= self.total:
          return cash_paid - self.total
      else:
          return "Cash paid not enough"

class Shop(ShoppingCart):
  def __init__(self):
      self.quantity = 100

  def remove_item(self):
      self.quantity -= 1

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