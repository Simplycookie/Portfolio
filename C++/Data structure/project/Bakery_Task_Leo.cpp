#include <iostream>
#include <string>
#include <stdio.h>
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

    itemnode():link(NULL){
        value.name = "";
        value.cost = 0.0;
    }

    itemnode(string n, double p):link(NULL){
    value.name = n;
    value.cost = p;
}
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
//Arfan End
//Leo Start

itemnode* search_item(string name){
    itemnode* temp;
    int index, count = 1;

    index = hashcode_char_to_int(name[0]);
    temp = &itemarray[index];

    while(temp->value.name != name && temp != NULL){
        count++;
        temp = temp->link;
    }

    if(temp != NULL){
        cout<<"Item found at index : ("<<index<<") and the ("<<count<<")nd chain"<<endl;
        return temp;
    } else{
        cout<<"Error : Item '"<<name<<"' was not found in the hash table."<<endl;
        return NULL;
    }
}



void delete_item(string name){
    itemnode* temp;
    itemnode* priv;
    int index, count = 1;

    index = hashcode_char_to_int(name[0]);

    temp = &itemarray[index];
    priv = temp;

    while(temp->value.name != name && temp != NULL){
        count++;
        priv = temp;
        temp = temp->link;
    }

    if(temp != NULL && temp->value.name != ""){
        cout<<"Item found at index : ("<<index<<") and the ("<<count<<")nd chain"<<endl;
        priv->link = temp->link;
        temp->link = NULL;

        if(temp != &itemarray[index]){
            delete temp;
        } else{
            temp->value.name = "";
            temp->value.cost = 0.0;
        }
        cout<<"Item '"<<name<<"' has been deleted successfully."<<endl;
    } else{
        cout<<"Error : Item '"<<name<<"' was not found in the hash table."<<endl;
    }
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

    cout<<"\n=== ITEMS SORTED BY COST (Lowest to Highest) ==="<<endl;
    cout<<"--------------------------------------------------"<<endl;

    for(int i = 0; i < count; i++){
        cout<<"Item : "<<sortarr[i].name<<" | Cost : RM "<< sortarr[i].cost<<endl;
    }
    cout<<"=================================================="<<endl;
    delete[] sortarr;
}


int main(){
    startup();
    sorted_display_cost();

}