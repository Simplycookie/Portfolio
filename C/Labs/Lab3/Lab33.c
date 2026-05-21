#include <stdio.h>
#include <string.h>
char name[30], room_code, roomtype[30];
int num_days;
float Roomprice,Bill;
int valid = 1;
int main(){
    printf("-----------------------------------------------------------------------------\n");
    printf("\t\tWELCOME TO LEGAND HOTAL\n");
    printf("-----------------------------------------------------------------------------\n");
    printf("Rooms : Deluxe(1 or D)\tTwin Sharing(2 ir T)\t Single(3 or S)\n\n");
    printf("Enter your name\t\t: ");
    gets(name);
    printf("Enter Room Type\t\t: ");
    fflush(stdin);
    scanf("%c",&room_code);
    printf("Enter number of days\t: ");
    scanf("%d",&num_days);
    printf("\n");

    switch (room_code)
    {
    case '1':
    case 'd':
    case 'D':
        Roomprice = 200.00;
        strcpy(roomtype,'Deluxe');
        break;
    case '2':
    case 't':
    case 'T':
        Roomprice = 170.00;
        strcpy(roomtype,'Twin Sharing');
    case '3':
    case 's':
    case 'S':
        Roomprice = 120.00;
        strcpy(roomtype,"Single");
        break;
    default:

        break;
    }
    if(valid==1){
        printf("----------------------------------------------------------\n");
        printf("\t\tPAYMENT RECEIPT\n");
        printf("----------------------------------------------------------\n");
        Bill = Roomprice * num_days;
        printf("Customer Name \t\t: %s\n",name);
        printf("Room Type\t\t: %s\n", roomtype);
        printf("Room price\t\t: RM%.2f\n",Roomprice);
        printf("Numbe of days\t: %d\n",num_days);
        printf("Bill\t\t\t: RM%.2f\n",Bill);
    }
    
}



