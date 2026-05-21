#include <iostream>
#include <stdio.h>
using namespace std;



struct item{
    string name;
    double cost;
    int quantity;
};

struct itemnode{
    item value;
    itemnode *link = NULL;
};

itemnode itemarray[26];

void decor_line(){
    cout<<"---------------------------------------"<<endl;
}

void decor_2(string x)
{
    cout<<"---- "<<x<<" ----"<<endl<<endl;
}

void decor_3(string x, double y)
{
    cout <<x<<" --- RM "<<y<<endl;
}

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

void item_loading(){
    item itemplaceholder;
    int index;
    char placeholder_char[100];
    itemnode *temp,*priv;
    FILE *itemfile;
    itemfile = fopen("items_data.txt","r");
    if (itemfile == NULL) {
        printf("Error! opening file");
        return;
    }
    cout<<"|";
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
    }

    fclose(itemfile);
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

void startup(){
    decor_line();
    cout<<"Bakery Systems"<<endl;
    decor_line();
    item_loading();
    for(int i=0;i<5;i++){
        cout<<"-\n";
    }
}

void display_alphabate(){
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
const int order_limit = 100;

struct order_list{
    string id;
    string name[order_limit];
    double price[order_limit];
    double total_price;
};

void order_id_genarator(order_list *ref_order){
    static int id_num1 = 1;
    static int id_num2 = 0;
    ref_order->id = "";
    ref_order->id += "C";
    ref_order->id += id_num2+48;
    ref_order->id += id_num1+48;
    id_num1++;
    if(id_num1>9){
        id_num2++;
        id_num1=0;
        if (id_num2>9)
        {
            id_num2=0;
            id_num1++;
        }
    }
}

//Arfan End

struct queue{
    int head,tail;
    order_list orders[order_limit];//order list is here
};

queue main_queue;

void test_data(queue *ref_queue, int index = 0)
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
    main_queue.head=0;
    main_queue.tail=111; // test data
}

void order_id_genarator(queue *ref_queue, int index=0, int num=1){
    static int id_num1 = 1;
    static int id_num2 = 0;
    for(int i=0;i<num;i++){
        ref_queue->orders[i+index].id = "";
        ref_queue->orders[i+index].id += "C";
        ref_queue->orders[i+index].id += id_num2+48;
        ref_queue->orders[i+index].id += id_num1+48;
        id_num1++;
        if(id_num1>9){
            id_num2++;
            id_num1=0;
            if (id_num2>9)
            {
                id_num2=0;
                id_num1++;
            }
        }
    }
}

class customer_queue_management
{

    public:

    void queue_menu(queue *main_queue)
    {
        for (int i = main_queue->head; i <= main_queue->tail;i++)
        {
            cout<<main_queue->orders[i].id<<endl;
        }
        decor_line();
        decor_2("Options");
        cout<<"[1] Serve top\n[2] View order\n[3] Cancel top\n[4] Leave queue menu"<<endl;

        options();
            
    }

    void options()
    {
        decor_line();
        int choice;
        cout<<"Input Option Here : ";
        cin>>choice;
        switch (choice)
        {
        case 1:
            serve_top(&main_queue);
            break;

        case 2:
            view_orders(&main_queue);
            break;

        case 3:
            cancel_top(&main_queue);
            break;

        case 4:
            return; //This part should return back to the main menu
        
        default:

            cout<<"Option not found! Please insert a valid option."<<endl;
            return options();
            break;
        }
    }
    
    void serve_top(queue *main_queue)
    {
        int i = 0;
        main_queue->orders[main_queue->head].total_price = 0;
        decor_line();
        decor_2("Now Serving "+ main_queue->orders[main_queue->head].id);
        while (main_queue->orders[main_queue->head].name[i] != "" || !main_queue->orders[main_queue->head].name[i].empty())
        {
            decor_3(main_queue->orders[main_queue->head].name[i], main_queue->orders[main_queue->head].price[i]);

            main_queue->orders[main_queue->head].total_price += main_queue->orders[main_queue->head].price[i];
            i++;
        }
        cout<<endl;
        decor_2("Total Price");
        cout<<"RM "<<main_queue->orders[main_queue->head].total_price<<endl;
        main_queue->head++;
        if(main_queue->head == main_queue->tail)
        {
            return;
        }
        options();
    }

    void view_orders(queue *main_queue)
    {
        for (int i = main_queue->head; i < main_queue->tail; i++)
        {
            int j = 0;
            decor_2(main_queue->orders[i].id);
            while (main_queue->orders[i].name[j] != "" || !main_queue->orders[i].name[j].empty())
            {
                decor_3(main_queue->orders[i].name[j], main_queue->orders[i].price[j]);
                j++;
            }
            decor_line();
        }

        options();
    }

    void cancel_top(queue *main_queue) // incomplete
    {
        int i = 0;
        main_queue->orders[main_queue->head].total_price = 0;
        decor_line();
        decor_2("Now Serving "+ main_queue->orders[main_queue->head].id);
        while (main_queue->orders[main_queue->head].name[i] != "" || !main_queue->orders[main_queue->head].name[i].empty())
        {
            decor_3(main_queue->orders[main_queue->head].name[i], main_queue->orders[main_queue->head].price[i]);

            main_queue->orders[main_queue->head].total_price += main_queue->orders[main_queue->head].price[i];
            i++;
        }
        cout<<endl;
        decor_2("Total Price");
        cout<<"RM "<<main_queue->orders[main_queue->head].total_price<<endl;
        main_queue->head++;
        if(main_queue->head == main_queue->tail)
        {
            return;
        }
        options();
    }

};

//Task Start:
// Mutaz part
class order_stack{
    private:
        order_list stack;   // stack container
        int Head = -1;      // top of stack
        itemnode *temp;     // pointer for traversal
        double total_price = 0; // running total

    public:

        // push item into stack
        void add_item(char letter, int number){
            de
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
                cout<<"item not found"<<endl;
            }
        }

        // pop item from stack
        void remove_item(){

            if(Head == -1){
                cout<<"stack is empty"<<endl;
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

order_list order_menu(order_stack &current_order) {
    
    int choice;
    char letter;
    string input;
    int number;

    do{
        decor_line();
        cout<<"1. Add Item"<<endl;
        cout<<"2. Remove Item"<<endl;
        cout<<"3. Display Order"<<endl;
        cout<<"4. Confirm Order"<<endl;
        decor_line();
        choice = 0;
        cin>>input;
        choice = int(input[0]);
        choice -= 48;
        
        
        switch(choice){

            case 1:
                cout<<"Enter first letter of item: ";
                cin>>letter;

                cout<<"Enter item number: ";
                cin>>number;

                current_order.add_item(letter,number);
                break;

            case 2:
                current_order.remove_item();
                break;

            case 3:
                current_order.display_stack();
                break;

            case 4:
                return current_order.confirm_order();

            default:
                choice = 0;
                break;
        }

    }while(choice!=4);
}


int main(){
    startup();
    order_stack test_stack;
    main_queue.orders[main_queue.tail] = order_menu(test_stack);
    return 0;
}