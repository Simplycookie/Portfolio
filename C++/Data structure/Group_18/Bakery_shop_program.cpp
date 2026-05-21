#include <iostream>
#include <fstream>
#include <stdio.h>
using namespace std;

//MUHAMMAD ARFAN BIN SHAHNAZ FARIZ Start
// items refer to a base value for all Items
struct item{
    string name;
    double cost;
    int quantity;
    item(){
        name = "";
        cost = 0;
        quantity = 0;
    }
    item(string n, double p, int q){
        name = n;
        cost = p;
        quantity = q;
    }
};

//itemnode is a specific linked list structure for items
struct itemnode{
    item value;
    itemnode *link;
    //LEE ZHE HONG addition
    itemnode(){
        value.name = "";
        value.cost = 0.0;
        link = NULL;
    }

    itemnode(string n, double p){
    value.name = n;
    value.cost = p;
    link = NULL;
    //LEE ZHE HONG end of addition
}
}itemarray[26]; // the Global Array of itemnode, in the range of 26 for the letters in the alphabet
// this allows for a hash array with a chain collision operation, using linked lists to store more data


void decor_line(){//simple line of decor
    cout<<"---------------------------------------"<<endl;
}
void decor_line_2(){//simple line of decor
    cout<<"======================================="<<endl;
}

//ISABELLE S LOJUNTIN addition
void decor_2(string x) // ex. ---- Options ----
{
    cout<<"==== "<<x<<" ===="<<endl;
}

void decor_3(string x, double y) // ex. Lemon Cheesecake --- RM 18
{
    cout <<x<<" --- RM "<<y<<endl;
}
//ISABELLE S LOJUNTIN end of adition

/*This function is a simple fix for the issue that cin>>choice would have in which when a string value was 
entered, cin did not empty and kept trying to insert a string into an interger*/
int get_int_input(){
    int choice;
    string input;//The use of a mediator string variable is used to input into in which then it would convert into an interger
    cout<<"Input Option Here : ";
    cin>>input;
    choice = int(input[0]);
    choice -= 48;
    return choice;
}

/*The hashcode_char_to_int function allows a char character to be accurately given a hash value based on the english Alphabet.
it is not case nensitive*/
int hashcode_char_to_int(char name){
    int converted_name = int(name);
    if(converted_name>=65 and converted_name<=90){
        converted_name+=32;
    }
    if(converted_name>=97 and converted_name<=122){
        converted_name-=97;
    }
    int output;
    output = converted_name % 26;
    return output;
}

/*Item_loading function takes from an external txt file to input all previous item data into the new session*/
void item_loading(){
    item itemplaceholder;
    int index;
    char placeholder_char[100];
    itemnode *temp,*priv;
    // uses the base C version of File management due to C++ being unable to read anything from the file as any datatype other than strings
    FILE *itemfile;
    itemfile = fopen("items_data.txt","r");
    if (itemfile == NULL) {
        printf("Error! opening file");
        return;
    }
    cout<<"|";
    //The order of the file is name, cost, and quantity
    while(fscanf(itemfile,"%s %lf %d",placeholder_char,&itemplaceholder.cost,&itemplaceholder.quantity)==3){
        cout<<"-";
        index = hashcode_char_to_int(placeholder_char[0]);
        temp = &itemarray[index];
        while(temp!=NULL){
            priv = temp;
            temp = temp->link;
        }
        temp = new itemnode;
        temp->link=NULL;
        temp->value.name = "";
        temp->value.cost = 0.0;
        temp->value.quantity = 0;
        priv->link = temp;
        itemplaceholder.name = placeholder_char;
        priv->value = itemplaceholder;
        //use a hash Array chain collision to add more data to the hash value
    }
    cout<<"|Loading Complete"<<endl;
    for(int i=0;i<26;i++){
        temp = &itemarray[i];
        while(temp!=NULL){
            if(temp->value.name!=""){
                cout<<temp->value.name;
                cout<<endl;
            }

            temp = temp->link;
        }
        
    }
}

//simple bootup function
void startup(){
    decor_line();
    cout<<"Bakery System"<<endl;
    decor_line();
    item_loading();
    for(int i=0;i<5;i++){
        cout<<"-\n";
    }
}

//displays all name in itemarray in Alphabetical order
void display_alphabet(){
    itemnode *temp;
    for(int i=0;i<26;i++){
        temp = &itemarray[i];
        while(temp!=NULL){
            if(temp->value.name!=""){
                cout<<temp->value.name;
                cout<<endl;
            }
            temp = temp->link;
        } 
    }
}

//displays all values in the itemarray in Alphabetical order
void display_details_alphabet(){
    itemnode *temp;
    string char_converted;
    int count = 1;
    decor_line();
    decor_2("Items Sorted By Name (Aphabetical Order)");
    for(int i=0;i<26;i++){
        temp = &itemarray[i];
        if(temp->value.name!=""){
            char_converted = char(i+65);
            count = 1;
            decor_2(char_converted);
        }
        //due to the system being a hash array with a chain linked list, traversal through each chain is
        while(temp!=NULL){
            if(temp->value.name!=""){
                cout<<"["<<count<<"] Item : "<<temp->value.name<<" | Cost : RM "<<temp->value.cost<<" | Quantity : "<<temp->value.quantity<<endl;
                count++;
                decor_line();
            }
            temp = temp->link;
        } 
    }
    decor_line_2();
}
//LEE ZHE HONG Start

itemnode* search_item(string name){
    itemnode* temp;
    int index, count = 1;

    index = hashcode_char_to_int(name[0]);
    temp = &itemarray[index];

    while(temp->value.name != name && temp->link != NULL && temp->value.name !=""){
        count++;
        temp = temp->link;
    }

    if(temp->link != NULL){
        cout<<"Item found at index : ("<<index<<") and the ("<<count<<")nd chain"<<endl;
        return temp;
    } else{
        cout<<"Error : Item '"<<name<<"' was not found in the hash table."<<endl;
        return NULL;
    }
}

itemnode* search_item_without_text(string name){
    itemnode* temp;
    int index, count = 1;

    index = hashcode_char_to_int(name[0]);
    temp = &itemarray[index];

    while(temp->value.name != name && temp->link != NULL && temp->value.name !=""){
        count++;
        temp = temp->link;
    }

    if(temp->link != NULL){
        return temp;
    } else{
        cout<<"Error : Item '"<<name<<"' was not found in the hash table."<<endl;
        return NULL;
    }
}

void delete_item(string name){
    
    itemnode *temp;
    itemnode *priv;
    int index, count = 1;

    index = hashcode_char_to_int(name[0]);

    temp = &itemarray[index];
    priv = temp;
    
    while(temp->value.name != name && temp->link != NULL && temp->value.name !=""){
        count++;
        priv = temp;
        temp = temp->link;
    }
    if(temp->link != NULL){
        cout<<"Item found at index : ("<<index<<") and the ("<<count<<")nd chain"<<endl;
        priv->link = temp->link;
        temp->link = NULL;

        if(temp != &itemarray[index]){
            cout<<"Item '"<<temp->value.name<<"' has been deleted successfully."<<endl;
            delete temp;
        }else{
            cout<<"Item '"<<temp->value.name<<"' has been deleted successfully."<<endl;
            temp->value.name = "";
            temp->value.cost = 0.0;
        }
        
    } else{
        cout<<"Error : Item '"<<name<<"' was not found in the hash table."<<endl;
    }
    return;
}

void sorted_display_cost(){
    item* sortarr;
    int size = 1, count = 0;
    itemnode* temp;

    for(int i = 0; i < 26; i++){
        temp = &itemarray[i];
        while(temp != NULL){
            if(temp->value.name != ""){
                size++;
            }
            temp = temp->link;
        }
    }

    sortarr = new item[size];

    for(int i = 0; i < 26; i++){
        temp = &itemarray[i];
        while(temp != NULL){
            if(temp->value.name != ""){
                sortarr[count] = temp->value;
                count++;
            }
            temp = temp->link;
        }
    }

    for(int i = 0; i < count - 1; i++){
        for(int j = 0; j < count - i - 1; j++){
            if(sortarr[j].cost > sortarr[j + 1].cost){
                item tempItem = sortarr[j];
                sortarr[j] = sortarr[j + 1];
                sortarr[j + 1] = tempItem;
            }
        }
    }

    decor_2("Items Sorted by Cost (lowest to Highest)");
    decor_line();

    for(int i = 0; i < count; i++){
        cout<<"Item: "<<sortarr[i].name<<" | Cost: RM "<< sortarr[i].cost <<" | Quantity: "<<sortarr[i].quantity<<endl;
        decor_line();
    }
    decor_line_2();
    delete[] sortarr;
}

void sorted_display_quantity(){
    item* sortarr;
    int size = 1, count = 0;
    itemnode* temp;

    for(int i = 0; i < 26; i++){
        temp = &itemarray[i];
        while(temp != NULL){
            if(temp->value.name != ""){
                size++;
            }
            temp = temp->link;
        }
    }

    sortarr = new item[size];

    for(int i = 0; i < 26; i++){
        temp = &itemarray[i];
        while(temp != NULL){
            if(temp->value.name != ""){
                sortarr[count] = temp->value;
                count++;
            }
            temp = temp->link;
        }
    }

    for(int i = 0; i < count - 1; i++){
        for(int j = 0; j < count - i - 1; j++){
            if(sortarr[j].quantity > sortarr[j + 1].quantity){
                item tempItem = sortarr[j];
                sortarr[j] = sortarr[j + 1];
                sortarr[j + 1] = tempItem;
            }
        }
    }
    decor_2("Items Sorted by Quantity (lowest to Highest) ");
    decor_line();

    for(int i = 0; i < count; i++){
        cout<<"Item: "<<sortarr[i].name<<" | Cost: RM "<< sortarr[i].cost <<" | Quantity: "<<sortarr[i].quantity<<endl;
        decor_line();
    }
    decor_line_2();
    delete[] sortarr;
}

//End of LEE ZHE HONG part continue MUHAMMAD ARFAN BIN SHAHNAZ FARIZ part

//the item_management_system handloe the manu and direct interaction with the items in the itemarray
class item_management_system{
    private:
    //the add item uses the hash values and chain collision to add a new item into the list
    void add_item(string n,double p,int q){
        item temp_item(n,p,q);
        int index = hashcode_char_to_int(n[0]);
        itemnode *temp,*priv;
        temp = &itemarray[index];//traversal of the chain
        while(temp!=NULL && temp->value.name != temp_item.name){
            priv = temp;
            temp = temp->link;
        }
        if(temp==NULL){
            cout<<"Item added successfully";
            temp = new itemnode;//creates an empty new item for the next item to be added
            temp->link=NULL;
            temp->value.name = "";
            temp->value.cost = 0.0;
            temp->value.quantity = 0;
            priv->link = temp;
            priv->value = temp_item;
        }
        else{
            cout<<"Item is already in the itemarray";
        }
        cout<<endl;
    }

    public:
    //the item_management_menu function acts as a hub for the user to access the various functions relating to itemarray.
    void item_management_menu(){
        int choice;
        string temp_name = "";
        double temp_price = 0;
        int temp_qty = 0;
        itemnode *temp_node;
        while(true){
            choice = 0;
            decor_line();
            cout<<"[1] Add Item"<<endl;
            cout<<"[2] Delete Item"<<endl;
            cout<<"[3] View Items"<<endl;
            cout<<"[4] Search Item"<<endl;
            cout<<"[5] Modifiy Item"<<endl;
            cout<<"[6] Add Item Stock"<<endl;
            cout<<"[7] Save"<<endl;
            cout<<"[8] Return"<<endl;
            while(choice<1 || choice>8){
                choice = get_int_input();
            }
            switch (choice)
            {
            case 1:
                //inputs the items name, cost, and Quantity
                temp_name = "";
                temp_price = 0;
                temp_qty = 0;
                cout<<"Name(No Spaces):";
                cin>>temp_name;
                cin.clear();
                cout<<"Cost:";
                cin>>temp_price;
                cout<<"Quantity:";
                cin>>temp_qty;
                add_item(temp_name,temp_price,temp_qty);
                break;
            case 2://deletes an item
                temp_name = "";
                cout<<"Enter the Item name(no spaces) you would like to delete: ";
                cin>>temp_name;
                cin.clear();
                delete_item(temp_name);
                break;
            case 3://allows user to view the items in a sorted list of their choice
                choice = 0;
                while(choice != 4){
                    cout<<"[1] Display alphabetical order\n";
                    cout<<"[2] Display sorted by cost\n";
                    cout<<"[3] Display sorted by quantity\n";
                    cout<<"[4] Return\n:";
                    choice = get_int_input();
                    switch (choice)
                    {
                        case 1:
                            display_details_alphabet();
                            break;
                        case 2:
                            sorted_display_cost();
                            break;
                        
                        case 3:
                            sorted_display_quantity();
                            break;
                        case 4:
                            break;
                        default:
                            cout<<"invalid";
                            break;
                    }
                }
                break;
            case 4://searches a specific item in the itemarray
                temp_name = "";
                cout<<"Enter the searched Item name(no spaces):";
                cin>>temp_name;
                cin.clear();
                temp_node = search_item(temp_name);
                if (temp_node != NULL)
                {
                    cout<<"|Name: "<<temp_node->value.name<<"|\n|Cost: RM"<<temp_node->value.cost<<"|\n|Stock: "<<temp_node->value.quantity<<"|\n";
                }
                break;
            case 5://searches and edits a specific item in the itemarray
                temp_name = "";
                cout<<"Enter the Item name(no spaces):";
                cin>>temp_name;
                cin.clear();
                temp_node = search_item(temp_name);
                choice = 0;
                while(choice!=4){
                    decor_line();
                    cout<<"|Name: "<<temp_node->value.name<<"|\n|Cost: RM"<<temp_node->value.cost<<"|\n|Stock: "<<temp_node->value.quantity<<"|";
                    decor_2("Options");
                    cout<<"[1] Change name:\n";
                    cout<<"[2] Change cost:\n";
                    cout<<"[3] Change quiantity\n";
                    cout<<"[4] Return:\n:";
                    choice = get_int_input();
                    switch(choice)
                    {
                    case 1:
                        decor_2("Input new item name");
                        cout<<"\n:";
                        temp_name = "";
                        cin>>temp_name;
                        cin.clear();
                        temp_node->value.name = temp_name;
                        break;
                    case 2:
                        decor_2("Input new item cost");
                        cout<<"\n:";
                        cin>>temp_price;
                        temp_node->value.cost = temp_price;
                        break;
                    case 3:
                        decor_2("Input new item quantity");
                        cout<<"\n:";
                        cin>>temp_qty;
                        temp_node->value.quantity = temp_qty;
                        break;
                    case 4:
                        break;
                    default:
                        cout<<"Invalid input!";
                        break;
                    }
                }
                break;
            case 6://searches for a specific item to add stock to
                temp_name = "";
                cout<<"Enter item name(no spaces) : ";
                cin>>temp_name;
                cin.clear();
                temp_node = search_item(temp_name);
                if(temp_node == NULL){
                    break;
                }
                else{
                    cout<<"|Name: "<<temp_node->value.name<<"|\n|Cost: RM"<<temp_node->value.cost<<"|\n|Stock: "<<temp_node->value.quantity<<"|";
                    cout<<"Enter how many stock(s) to add";
                    temp_qty = get_int_input();
                    temp_node->value.quantity += temp_qty;
                    break;
                }
            case 7:// saves all changes into the file "items_data.txt"
                save();
                break;
            case 8://returns to main menu
                return;
            default:
                break;
            }
        }
    
    }
    //the save function saves the
    void save(){
        //save uses the C++ version of FILE due to it being easier to write into a file then the C version
        try
        {
            ofstream itemfile("items_data.txt");
            itemnode *temp;
            for(int i=0;i<26;i++){
                temp = &itemarray[i];
                while(temp!=NULL&&temp->value.name!=""){
                    itemfile<<temp->value.name<<" "<<temp->value.cost<<" "<<temp->value.quantity<<endl;
                    temp = temp->link;
                }
            }
            itemfile.close();
            cout<<"Saved succesfully"<<endl;
        }
        catch(const std::exception& e)
        {
            cout<<"Failed to save"<<endl;
        }
        return;
        
    }
};
//MUHAMMAD ARFAN BIN SHAHNAZ FARIZ End
const int order_limit = 100;

// ISABELLE S LOJUNTIN Start

struct order_list // Details for the orders for each instance
{
    string id;
    string name[order_limit];
    double price[order_limit];
    double total_price;
};

struct queue // The queue 
{
    int head,tail;
    order_list orders[order_limit];
};

queue main_queue; // Main queue created during launch for immediate usage

/*void test_data(queue *ref_queue, int index = 0) // TEST DATA
{
    ref_queue->orders[0+index].name[0] = "Applepie_slice";
    ref_queue->orders[0+index].price[0] = 4.00;
    ref_queue->orders[0+index].name[1] = "Applepie_slice";
    ref_queue->orders[0+index].price[1] = 4.00;
    ref_queue->orders[0+index].name[2] = "Applepie_slice";
    ref_queue->orders[0+index].price[2] = 4.00;
    ref_queue->orders[0+index].total_price = 12.00;
    ref_queue->orders[1+index].name[0] = "donut";
    ref_queue->orders[1+index].price[0] = 3.50;
    ref_queue->orders[1+index].total_price = 3.50;
    ref_queue->orders[2+index].name[0] = "Chocolete_Muffin";
    ref_queue->orders[2+index].price[0] = 5.00;
    ref_queue->orders[2+index].name[1] = "vanilla_Muffin";
    ref_queue->orders[2+index].price[1] = 5.00;
    ref_queue->orders[2+index].total_price = 10.00;
    ref_queue->orders[3+index].name[0] = "Applepie";
    ref_queue->orders[3+index].price[0] = 15.00;
    ref_queue->orders[3+index].total_price = 15.00;
}*/

void order_id_genarator(queue *ref_queue, int index=0, int num=1) // Generates the Order Identification Reference
{
    static int id_num1 = 1;
    static int id_num2 = 0;
    for(int i=0;i<num;i++)
    {
        ref_queue->orders[i+index].id = "";
        ref_queue->orders[i+index].id += "C";
        ref_queue->orders[i+index].id += id_num2+48; // ASCII
        ref_queue->orders[i+index].id += id_num1+48; // ASCII
        id_num1++;
        if(id_num1>9)
        {
            id_num2++;
            id_num1=0;
            if (id_num2>9) // When the ID number reached 99 the next ID number will reset back to 01 for ID reuse
            {
                id_num2=0;
                id_num1++;
            }
        }
    }
}

void order_id_genarator(order_list *ref_order) // Generates the Order Identification Reference
{
    static int id_num1 = 1;
    static int id_num2 = 0;
    ref_order->id = "";
    ref_order->id += "C";
    ref_order->id += id_num2+48; // ASCII
    ref_order->id += id_num1+48; // ASCII
    id_num1++;
    if(id_num1>9)
    {
        id_num2++;
        id_num1=0;
        if (id_num2>9) // When the ID number reached 99 the next ID number will reset back to 01 for ID reuse
        {
            id_num2=0;
            id_num1++;
        }
    }
}

class customer_queue_management // The customer queue management system availible for the employees
{

    public:

    void queue_menu(queue *main_queue) // The queue management menu filled with options such as serve top order,  view customer orders, cancel top order and back to Main Menu
    {
        decor_2("Order IDs");
        for (int i = main_queue->head; i <= main_queue->tail;i++)
        {
            cout<<main_queue->orders[i].id<<endl;
        }
        decor_line();
        options();
            
    }

    void options() // The options for the queue management menu
    {
        if(main_queue.head == main_queue.tail)
        {
            main_queue.head = 0;
            main_queue.tail = 0;
        }
        decor_2("Options");
        cout<<"[1] Serve top order\n[2] View customer orders\n[3] Cancel top order\n[4] Return to Main Menu"<<endl;
        decor_line();
        int choice;
        cout<<"Input Option Here : ";
        cin>>choice;
        decor_line();

        switch (choice)
        {
        case 1: // Serve top order
            serve_top(&main_queue);
            break;

        case 2: // View customer orders
            view_orders(&main_queue);
            break;

        case 3: // Cancel top order
            cancel_top(&main_queue);
            break;

        case 4: //Return back to the main menu
            return;
        
        default: // Error handling

            cout<<"Option not found! Please input a valid option."<<endl;
            return options();
            break;
        }

        return;
    }
    
    void serve_top(queue *main_queue) // Serves the top order in the queue
    {
        int i = 0;
        itemnode *temp;
        if(main_queue->head == main_queue->tail) // Checks if the queue is empty
        {
            cout<<"No orders available"<<endl;
            decor_line_2();
            return options();
        }
        else
        {
            main_queue->orders[main_queue->head].total_price = 0; // Initializing the total price
            
            decor_2("Now Serving "+ main_queue->orders[main_queue->head].id); // Prints out order ID
            while (main_queue->orders[main_queue->head].name[i] != "" || !main_queue->orders[main_queue->head].name[i].empty()) // Makes sure the queue's order list is not empty or blank 
            {
                decor_3(main_queue->orders[main_queue->head].name[i], main_queue->orders[main_queue->head].price[i]); // Prints out the order item's name and price
                temp = search_item_without_text(main_queue->orders[main_queue->head].name[i]);//Searches and minus the quantity of the item
                temp->value.quantity--;
                if(temp->value.quantity<0){temp->value.quantity=0;}//If quantity is below zero, it becomes 0 again because you can't have negitive stock of items 
                main_queue->orders[main_queue->head].total_price += main_queue->orders[main_queue->head].price[i]; // Adds up the total price
                i++;
            }
            cout<<endl;
            decor_2("Total Price");
            cout<<"RM "<<main_queue->orders[main_queue->head].total_price<<endl; // Prints out total price
            main_queue->head++; // Heads to the next order ID
        }
        
        decor_line_2();
        options(); // Prompt back the queue management menu

    }

    void view_orders(queue *main_queue) // View incompleted orders
    {
        for (int i = main_queue->head; i < main_queue->tail; i++) // Encompasses all incompleted orders
        {
            int j = 0;
            decor_2(main_queue->orders[i].id);
            while (main_queue->orders[i].name[j] != "" || !main_queue->orders[i].name[j].empty()) // Makes sure the queue's order list is not empty or blank 
            {
                decor_3(main_queue->orders[i].name[j], main_queue->orders[i].price[j]); // Prints out the order item's name and price
                j++;
            }
            decor_line();
        }
        cout<<"End of available orders"<<endl;
        decor_line_2();
        options(); // Prompt back the queue management menu
    }

    void cancel_top(queue *main_queue) // To search and delete a spesific order
    {
        int i = 0;

        if(main_queue->head == main_queue->tail) // Checks if the queue is empty
        {
            cout<<"No orders available"<<endl;
            decor_line_2();
            return options();
        }
        else
        {
            main_queue->orders[main_queue->head].total_price = 0; // Initializing the total price
            
            decor_2("Cancelling Order "+ main_queue->orders[main_queue->head].id); // Prints out order ID
            while (main_queue->orders[main_queue->head].name[i] != "" || !main_queue->orders[main_queue->head].name[i].empty()) // Makes sure the queue's order list is not empty or blank 
            {
                decor_3(main_queue->orders[main_queue->head].name[i], main_queue->orders[main_queue->head].price[i]); // Prints out the order item's name and price

                main_queue->orders[main_queue->head].total_price += main_queue->orders[main_queue->head].price[i]; // Adds up the total price
                i++;
            }
            cout<<endl;
            decor_2("Total Price");
            cout<<"RM "<<main_queue->orders[main_queue->head].total_price<<endl; // Prints out total price
            main_queue->head++; // Heads to the next order ID
        }
        
        decor_line_2();
        options(); // Prompt back the queue management menu
        
    }

};

//ISABELLE S LOJUNTIN End

// MUTAZ MOHAMED ABBAS SAAD part
class order_stack{
    private:
        order_list stack;   // stack container
        int Head = -1;      // top of stack
        itemnode *temp;     // pointer for traversal
        double total_price = 0; // running total

    public:

        // push item into stack
        void add_item(char letter, int number){
            
            int index;
            index = hashcode_char_to_int(letter); // convert letter to index

            temp = &itemarray[index]; // go to hashed location

            // move to correct item in linked list
            for(int i=0;i<(number-1);i++){
                if(temp!=NULL){
                    temp = temp->link;
                }
            }

            // check if item exists
            if(temp!=NULL && temp->value.name!=""){
                Head++; // move stack top

                stack.name[Head] = temp->value.name;
                stack.price[Head] = temp->value.cost;

                total_price += temp->value.cost; // update total
                stack.total_price = total_price;
            }
            else{
                cout<<"Item not found"<<endl;
            }
        }

        // pop item from stack
        void remove_item(){

            if(Head == -1){
                cout<<"Stack is empty"<<endl;
            }
            else{
                total_price -= stack.price[Head]; // subtract price
                stack.name[Head] = "";
                stack.price[Head] = 0;
                Head--; // move top down
            }
        }

        // display stack from top to bottom
        void display_stack(){

            for(int i = Head; i >= 0; i--){
                cout<<"Name: "<<stack.name[i]
                    <<"\t|\tPrice: RM"<<stack.price[i]
                    <<endl;
            }
        }

        // return the final order
        order_list confirm_order(){
            order_id_genarator(&stack);
            return stack;
        }
};

order_list order_menu() {
    
    order_stack current_order;
    int choice;
    string letter;
    string input;
    int number;

    do{
        decor_line();
        cout<<"[1] Add Order Item"<<endl;
        cout<<"[2] Remove Order Item"<<endl;
        cout<<"[3] Display Order Items"<<endl;
        cout<<"[4] Confirm Order"<<endl;
        cout<<"[5] Return to Main Menu"<<endl;
        decor_line();
        choice = get_int_input();
        
        switch(choice){

            case 1:
                display_details_alphabet();
                cout<<"Enter first letter of item: ";
                cin>>letter;

                cout<<"Enter item number: ";
                cin>>number;

                current_order.add_item(letter[0],number);
                break;

            case 2:
                current_order.remove_item();
                break;

            case 3:
                current_order.display_stack();
                break;

            case 4:
                return current_order.confirm_order();

            case 5:
                return order_list();
            default:
                choice = 0;
                break;
        }

    }while(choice!=6);
}
//MUTAZ MOHAMED ABBAS SAAD end

int main(){
    startup();
    main_queue.head = 0;
    main_queue.tail = 0;
    int choice;
    string letter;
    item_management_system IMS;
    customer_queue_management CQM;
    order_list order;
    while(true){

        decor_2("Main Menu");
        cout<<"[1] Create customer order\n";
        cout<<"[2] Manage orders\n";
        cout<<"[3] Manage items\n";
        cout<<"[4] Exit system\n";
        decor_line();

        choice = get_int_input();
        switch(choice)
        {
            case 1:
                if(main_queue.tail!=100){
                    order = order_list();
                    order = order_menu();
                    if(order.name[0]!=""){
                        main_queue.orders[main_queue.tail] = order;
                        main_queue.tail++;
                    }
                }
                else{
                    cout<<"Queue is full";
                }
                break;
            case 2:
                CQM.queue_menu(&main_queue);
                break;
            case 3:
                IMS.item_management_menu();
                break;
            case 4:
                cout<<"Save?[y/n] : ";
                cin>>letter;
                if(letter[0]=='y'||letter[0]=='Y'){
                    IMS.save();
                }
                decor_line();
                cout<<"Thank you for using the bakery system\nProgramme terminated\n";
                decor_line_2();
                return 0;
                break;
            default:
                break;
        }
    }
    return 0;
}