#include <iostream>
#include <stdio.h>
#include <string.h>
using namespace std;

//Arfan
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

void display_details_alphabate(){
    itemnode *temp;
    for(int i=0;i<26;i++){
        temp = &itemarray[i];
        while(temp!=NULL){
            if(temp->value.name!=""){
                cout<<"|Name: "<<temp->value.name<<"|\t|Cost: RM"<<temp->value.cost<<"|\t|Stock: "<<temp->value.quantity;
                cout<<endl;
            }
            temp = temp->link;
        } 
    }
}

void item_management_menu(){
    return;
}
//Arfan End

const int order_limit = 25;
//Sheen Start

struct order_list{
    string id;
    string name[order_limit];
    double price[order_limit];
    double total_price;
};

struct queue{
    int head,tail;
    order_list orders[order_limit];
};

queue main_queue;

void test_data(queue *ref_queue, int index = 0){
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
    ref_queue->tail+=4;
}

void order_id_genarator(queue *ref_queue, int index=0, int num=1){
    static int id_num1 = 0;
    static int id_num2 = 0;
    for(int i=0;i<num;i++){
        ref_queue->orders[i+index].id = "";
        ref_queue->orders[i+index].id += ref_queue->orders[i+index].name[0][0];
        ref_queue->orders[i+index].id += id_num2+48;
        ref_queue->orders[i+index].id += id_num1+48;
        id_num1++;
        if(id_num1>9){
            id_num2++;
            id_num1=0;
            if (id_num2>9)
            {
                id_num2=0;
            }
        }
    }
}

//------i------//

int main(){
    startup();
    main_queue.head = 0;
    main_queue.tail = 0;
    test_data(&main_queue,0);
    order_id_genarator(&main_queue,0,4);

    display_details_alphabate();
    return 0;
}