class Node:
   def __init__(self, data):
      self.data = data
      self.next = None
      self.prev = None

class doubly_linked_list:
   def __init__(self):
      self.size = 1
      self.head = None
      self.tail = None

   def pushAtBeginning(self, data):
      NewNode = Node(data)
      if(self.head == None):
         self.head = NewNode
         self.tail = NewNode
         self.head.next = None
         self.tail.prev = None
      else:
         currHead = self.head
         currHead.prev = NewNode
         NewNode.next = currHead
         NewNode.prev = None 
         self.head = NewNode
      self.size = self.size + 1

   def pushAtMiddle(self, data):
      NewNode = Node(data)
      if(self.head == None):
         self.head = NewNode
         self.tail = NewNode
         self.head.next = None
         self.tail.prev = None
      else:
         current = self.head;
         mid = (self.size//2) if(self.size % 2 == 0)  else ((self.size+1)//2);
         for i in range(1, mid):
            current = current.next;
         temp = current.next;
         temp.prev = current;
         current.next = NewNode;
         NewNode.prev = current;
         NewNode.next = temp;
         temp.prev = NewNode;  
      self.size = self.size + 1   

   def pushAtEnd(self, data):
      NewNode = Node(data)
      if(self.head == None):
         self.head = NewNode
         self.tail = NewNode
         self.head.next = None
         self.tail.prev = None
      else:
         currTail = self.tail
         currTail.next = NewNode
         NewNode.prev = currTail
         self.tail = NewNode
         self.tail.next = None
      self.size = self.size + 1   
   
   def append(self, data):
      NewNode = Node(data)
      if(self.head == None):
         self.head = NewNode
         self.tail = NewNode
         self.head.next = None
         self.tail.prev = None
      else:
         currHead = self.head
         while (currHead.next != None):
            currHead = currHead.next
         currHead.next = NewNode
         NewNode.prev = currHead
         self.tail = NewNode
         self.size = self.size + 1
         return

   def deleteAtBeginning(self):
      if(self.head == None):
         return
      else:
         if(self.head != self.tail):
            self.head = self.head.next
            self.head.prev = None
         else:
            self.head = None
            self.tail = None
      self.size = self.size - 1     

   def deleteAtPosition(self, position):
      if(self.head == None):
         return
      temp = self.head   
      if(position == 0):
         self.head = temp.next
         temp = None
         return
      for i in range(position -1):
         temp = temp.next
         if temp is None:
            break
      if temp is None:     
         return
      if temp.next is None:
         return
      print("Menghapus node sesuai posisi index ke " + str(position))    
      next = temp.next.next
      temp.next = None
      temp.next = next
      self.size = self.size - 1     

   def deleteAtEnd(self):
      if(self.head == None):
         return
      else:
         if(self.head != self.tail):
            self.tail = self.tail.prev
            self.tail.next = None
         else:
            self.head = None
            self.tail = None
      self.size = self.size - 1         

   def lengthList(self):
      print("Jumlah data pada link list : " + str(self.size))
      print("")

   def listprint(self):
      currNode = self.head
      if(self.head == None):    
         print("Data Linked List Kosong");    
         return;  
      while (currNode is not None):
         print(currNode.data),
         currNode = currNode.next


doubleLL = doubly_linked_list()
print("Data pada Linked List")
doubleLL.append(10)
doubleLL.append(20)
doubleLL.append(30)
doubleLL.append(40)
doubleLL.append(50)
doubleLL.append(60)
doubleLL.listprint()
doubleLL.lengthList()


print("Menambahkan data di awal")
doubleLL.pushAtBeginning(100)
doubleLL.listprint()
doubleLL.lengthList()


print("Menambahkan data di Tengah")
doubleLL.pushAtMiddle(120)
doubleLL.listprint()
doubleLL.lengthList()


print("Menambahkan data di akhir")
doubleLL.pushAtEnd(70)
doubleLL.listprint()
doubleLL.lengthList()


print("Menghapus data di awal")
doubleLL.deleteAtBeginning()
doubleLL.listprint()
doubleLL.lengthList()


print("Menghapus data di Posisi Tertentu")
doubleLL.deleteAtPosition(3)
doubleLL.listprint()
doubleLL.lengthList()


print("Menghapus data di akhir")
doubleLL.deleteAtEnd()
doubleLL.listprint()
doubleLL.lengthList()


