#include <stdio.h>
#include <string.h>
void booking_loader();
void make_booking(struct Booking Booking_details,struct Flight_d Flight_d);
void save_booking(struct Booking Booking_details[100],struct Flight_d Flight_d[3]);
// Structure flight holds all the deta of a FLight
struct Flight_d
{
    int Flight_capacity_data[3][30];
    float Flight_class_price[3];
    char destinations[3][15];
};
struct Booking{
    int flight;
    int class;
    int seat;
};
int book_size;


// Flight display prototype
void Flight_details_display(struct Flight_d Flight_d);
// loader prototype
int Flight_loader(struct Flight_d Flight_d[3]);

int main(){
    struct Booking Booking_details[100];
    struct Flight_d Flight_d[3];
    int choice,Flight_C,flight_id;
    Flight_Loader(Flight_d);
    Booking_loader(Booking_details);
    printf("enter a valid flight id [1][2][3] : ");
    scanf("%d",&flight_id);
    while(flight_id!=1 && flight_id!=2 && flight_id!=3){
    printf("enter a valid flight id [1][2][3] : ");
    scanf("%d",&flight_id);
    }
    Booking_details[book_size].flight=choice;
    make_booking(Booking_details[book_size],Flight_d[choice-1]);
    save_booking(Booking_details,Flight_d);


    // intisilizing Flight_deta, File, and loading elements
    struct Flight_d Flight_d[3];
}

void Booking_loader( struct Booking Booking_details[100]) 
{
    FILE *fp;
    int flight_id, class_type, seat_number;
    int count = 0;
    
    // Open the file for reading
    fp = fopen("Booking_details.txt", "r");
    if (fp == NULL) {
        printf("Error: Could not open Booking_details.txt\n");
        return;
    }
    
    // Read the total number of bookings
    fscanf(fp, "%d", &book_size);
    
    // Read booking details from file
    while (fscanf(fp, "%d %d %d", &flight_id, &class_type, &seat_number) == 3) {
        Booking_details[count].flight = flight_id;
        Booking_details[count].class = class_type;
        Booking_details[count].seat = seat_number;
        count++;
    }
    
    printf("Booking details successfully loaded.\n");
    
    // Close the file
    fclose(fp);
}
void make_booking(struct Booking Booking_details,struct Flight_d Flight_d)
{
    int class_c,seat_c,valid;
    etails_display();
    do{
        valid=1;
        do{
        printf("Which class do you want : ");
        scanf("%c",&class_c);
        printf("which seat do you want : ");
        scanf("%d",&seat_c);
    }
    while(class_c>0 || class_c<=3 && seat_c>0 || seat_c<=3);
    if(Flight_d.Flight_class_price[class_c-1] == 0 || Flight_d.Flight_capacity_data[class_c-1][seat_c-1] == 1 ){
        valid=0;
    }
    }
    while(valid==0);
    printf("do you want to confirm? [1=yes] : ");
    scanf("%d",&valid);
    if(valid==1){
        Booking_details.class=class_c;
        Booking_details.seat=seat_c;
        Flight_d.Flight_capacity_data[class_c-1][seat_c-1];
    }

}
void save_booking(struct Booking Booking_details[100],struct Flight_d Flight_d[3]){
FILE *fp;//create a new file called fp
int book_size=0;
int count;
fp=fopen("booking_details.txt","w");//open booking_details.txt for writing
if(fp==NULL){
    printf("file unable to open");
}
else {

while(Booking_details[count].flight!=0){
    fprintf(fp,"%d %d %d",Booking_details[count].flight,Booking_details[count].class,Booking_details[count].seat);//write 3 integers in fp
    fprintf(fp,"\n");
    book_size++;
}
rewind(fp);
fprintf(fp,"%d\n ",book_size);
fclose(fp);
fp=fopen("ata_seats.txt","w");
int i,j,p;
for(i=0;i<3;i++){

    for(j=0;j<3;j++){

        for(p=0;p<30;p++){//loop 30 times using p
            fprintf(fp,"%d ",Flight_d[i].Flight_capacity_data[j][p]);
        }
        fprintf(fp,"\n");
    }
}
fclose(fp);
}//end of else{}





}
// the flight display function
void Flight_details_display(struct Flight_d Flight_d){
    int i,j,p,q;
    // displays the destination, time and date
    printf("going to %s at %s around %s\n",Flight_d.destinations[0],Flight_d.destinations[1],Flight_d.destinations[2]);
    for (i = 0; i < 3; i++)
    {
        // displays each layer of class costs and seat capacity, will not display if cost= 0
        if(Flight_d.Flight_class_price[i] > 0.001){
            printf("class %d Cost: RM%.2f\n",i+1,Flight_d.Flight_class_price[i]);
            printf("----------------------------------------\n");
            // a long chain of for statements to allow for mimicry of a plane seat row layout
            for (j = 0; j < 3; j++){
                for (p = 0; p < 2; p++){
                    for (q = 0; q < 5; q++){
                        //a mathamatic equition that accounts for looping terms
                        //a new-line every 5 loops
                        //and adding new line every 10 loops
                        //also allows for alternating numbering for each new line
                        printf("%d",2*q+1+(1*p)+(10*j));
                        if((2*q+1+(1*p)+(10*j))<10 ){printf(" ");}
                        //checks if the seat is open or not (1:filled, 0:open)
                        if (Flight_d.Flight_capacity_data[i][2*q+1+(1*p)+(10*j)] != 1)
                            {printf("[ open ]\t");}
                        else{printf("[filled]\t");}
                    }
                    printf("\n");
                }
                printf("\n");
            }
            
        }
    }
}
//a loader, due to limitations 2 files must be opened seperatly for seats and destination plus cost
int Flight_loader(struct Flight_d Flight_d[3]){
    FILE *fp1,*fp2;
    int seat,count=0,state1=0,state2=0;
    char destination[30];
    float class_price = 0;
    fp1 = fopen("Flight_deta_seats.txt","r");
    fp2 = fopen("Flight_deta_dest.txt","r");
    // File error check in regards to cannot be opened
    if(fp1 == NULL || fp2 == NULL){
        printf("File could not be opened!\nProgram stopped.\n");
        return 0;
    }
    // File loading into the Flight Stucture seat details
    while (fscanf(fp1,"%d",&seat)==1)
    {
        Flight_d[state2].Flight_capacity_data[state1][count] = seat;
        count++;
        if (count == 30)
        {
            count = 0;
            state1++;
            if (state1 == 3)
            {
                state1 = 0;
                state2++;
            }
        }
    }
    state2=0,state1=0;
    // File loading destination details and class price details
    while (fscanf(fp2,"%s %f",&destination,&class_price)==2){
        strcpy(Flight_d[state2].destinations[state1],destination);
        Flight_d[state2].Flight_class_price[state1] = class_price;
        state1++;
        if (state1==3)
        {
            state1=0;
            state2++;
        }
        
    }
    fclose(fp1);
    fclose(fp2);
    printf("loading complete\n");
}