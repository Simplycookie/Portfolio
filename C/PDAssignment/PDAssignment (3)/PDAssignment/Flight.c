#include <stdio.h>
#include<string.h>
#include<stdlib.h>

int MMO; //Main menu option
int FDO; //Flight detail option
int ps [10][9]; //Plane seats
int r,c,size;

//Function Protoype
void lines(); // Decoration
void menu_d(); // Main menu
void flight_d(); // Flight details
void load_f();// loading in flight details
void flight_layout(); // Flight array layout
void book_t(); // Book tickets
void view_b(); // View bookings
void cancel_t(); // Cancel ticket
void save(); //save details

//Structures
struct Passenger //PASANGER INFO
{
	char name[50];
  char emailAddress[40];
  char phoneNumber[20];
  char passportNumber[10];
  char passportExpiry[20];
  char baggageType[20];
  int Flight;
  char selectedSeat[5];
} passenger[20];



//c2_c, strcpy(selectedSeat,c2_c) = 1A


int main()
{
  int E = 0; // For looping back to the main menu
  while (E < 1)
  {
  // Main Menu
  menu_d();
  
  // Going into the sub menus
  switch (MMO)
  {
  case 1 :
    lines();
    printf("\t\tFlight Details");
    flight_d();
    break;
  case 2 :
    book_t();
    break;
  case 3 :
    view_b();
    break;
  case 4 :
    cancel_t();
    break;
  case 5 :
    E = 1;
    printf("Exiting...");
    break;
  default:
    printf("\nInvalid Option. Please Re-Enter");
    break;
  }
  }
}


//Function Definition

void lines()
{
  printf("\n------------------------------------------------------\n");
}

void menu_d() // Main menu
{
  lines();
  printf("\t\tMain Menu");
  lines();
  printf("\n\n\nOptions");
  printf("\n\n1. Flight Details\t[1]\n2. Book Ticket\t\t[2]\n3. View Bookings\t[3]\n4. Cancel Ticket\t[4]\n5. Exit\t\t\t[5]");
  printf("\n\nInsert Option [x] : ");
  scanf("%d", &MMO);
}

void flight_d() // Flight details
{
  lines();
  printf("\n1. Flight Number : 3008\n\n\tDestination\t: Sweden\n\tDeparture Date\t: 20/04/2025 [0630]\n\tSeat Capasity\t: 90\n\tPrice\t\t: RM 1,000\n");
  lines();
  printf("\n2. Flight Number : 1420\n\n\tDestination\t: Japan\n\tDeparture Date\t: 14/02/2025 [1215]\n\tSeat Capasity\t: 90\n\tPrice\t\t: RM 1,000\n");
  lines();
  printf("\n3. Flight Number : 2707\n\n\tDestination\t: Malaysia\n\tDeparture Date\t: 13/05/2025 [1645]\n\tSeat Capasity\t: 90\n\tPrice\t\t: RM 1,000\n");
  lines();
  printf("\n4. Flight Number : 3428\n\n\tDestination\t: America\n\tDeparture Date\t: 06/09/2025 [2200]\n\tSeat Capasity\t: 90\n\tPrice\t\t: RM 1,000\n");\
  lines();
  printf("\nInsert Flight Number : ");
  scanf("%d", &FDO);
  load_f();
}

void load_f() // Loading in the .txt files for reading
{
  int y;
  int x = 0;
  FILE *fp;
  do{
  y=1;
  switch (FDO)
  {
    case 3008:
      fp = fopen("sweden.txt", "r");
      break;

    case 1420:
      fp = fopen("japan.txt", "r");
      break;

    case 2707:
      fp = fopen("malaysia.txt", "r");
      break;

    case 3428:
      fp = fopen("america.txt", "r");
      break;

    default:
      printf("Invalid option! Please enter code again");
      y = 0;
      break;
  }
  }while (y==0);

  while (fscanf(fp, "%d", &x) == 1)// Using a temp var to hold the values
  {
    ps[r][c] = x;
    c++;
    if(c == 9)
    {
      c=0;
      r++;
    }
  }
  flight_layout();
  printf("\n");
  fclose(fp);
}

void flight_layout() // Pretty layouts :3
{
  printf("\n");
  // r means row, c means column
  for (r = 0; r < 10; r++)
  {
    switch (r)
    {
    case 0:
      printf("\n\n\n");
      break;
    
    case 2:
      printf("\n\n\n");
      break;

    case 6:
      printf("\n\n\n");
      break;

    default:
      break;
    }

    if (r < 9)
    {
      printf("Row  %d:\t", r+1);
    }
    else
    {
      printf("Row %d:\t", r+1);
    }

    for (c = 0; c < 9; c++)
    {
      switch (c)
      {
      case 3:
        printf("\t");
        break;
      case 6:
        printf("\t");
        break;
        default:
        break;
      }
      switch (c)
      {
      case 0:
        printf("A");
        break;
      case 1:
        printf("B");
        break;
      case 2:
        printf("C");
        break;
      case 3:
        printf("D");
        break;
      case 4:
        printf("E");
        break;
      case 5:
        printf("F");
        break;
      case 6:
        printf("G");
        break;
      case 7:
        printf("H");
        break;
      case 8:
        printf("I");
        break;
      
      default:
        break;
      }
      printf(" [");
      switch (ps[r][c])
      {
        case 0:
          printf(" O "); // 0 means it's Available
          break;
        case 1:
          printf(" X "); // 1 means it's Unavailable
          break;
      }

      printf("]  ");
    }
    printf("\n\n");
  }
  printf("Class type:\n\nFirst : Row 1-2 | Business : Row 3-6 | Economy : Row 7-10\n\nAvailable : O | Unavailable : X");
}

void book_t() // Book ticket
{
int p1;
char p2[40],p3[20],p4[10],p5[20],p6[20],p7[30],p8[20],p9[3];
FILE *fpp;
fpp = fopen("bookingdetails.txt","r");
size = 0;
while(fscanf(fpp, "%d %s %s %s %s %s %s %s %s",&p1,p2,p3,p4,p5,p6,p7,p8,p9)==9)
{
  passenger[size].Flight = p1;
  strcpy(passenger[size].name,p2);
  strcpy(passenger[size].emailAddress,p3);
  strcpy(passenger[size].phoneNumber,p4);
  strcpy(passenger[size].passportNumber,p5);
  strcpy(passenger[size].passportExpiry,p6);
  strcpy(passenger[size].baggageType,p8);
  printf("AHHHHHH%s",p7);
  strcpy(passenger[size].selectedSeat,p9);
  printf("loaded");
  size++;
}
fclose(fpp);

//insert your personal information
printf("\nWelcome to the Flight Booking System!\n");
printf("Please enter your details to complete your booking.\n");

printf("\nEnter your name: ");
scanf("%s", passenger[size].name); 

printf("\nEnter your Email Address: ");
scanf("%s", passenger[size].emailAddress);

printf("\nEnter your Phone Number: ");
scanf("%s", passenger[size].phoneNumber);

printf("\nEnter your Passport Number: ");
scanf("%s", passenger[size].passportNumber);

printf("\nEnter your Passport Expiry Date (YYMMDD): ");
scanf("%s", passenger[size].passportExpiry);


lines();
printf("\t\tPassenger Information");
lines();
printf("Name: %s\n", passenger[size].name);
printf("Email: %s\n", passenger[size].emailAddress);
printf("Phone: %s\n", passenger[size].phoneNumber);
printf("Passport Number: %s\n", passenger[size].passportNumber);
printf("Passport Expiry: %s\n", passenger[size].passportExpiry);

int baggageType;
struct Flight;
    
  //choose the baggage type
  lines(); 
  printf("\t\tBaggage Type");
  lines();
  printf("1. Carry-on\n");
  printf("2. Checked in\n");
  printf("3. Oversized\n");
  scanf("Enter your choice [1-4]: ");
  scanf("%d",&baggageType);

switch (baggageType) 
{
        case 1:
            strcpy(passenger[size].baggageType, "Carry-on");
            printf("Carry-on baggage selected.\n");
            break;
        case 2:
            strcpy(passenger[size].baggageType, "Checked-in");
            printf("Checked in baggage selected.\n");
            break;
        case 3:
            strcpy(passenger[size].baggageType, "Oversized");
            printf("Oversized baggage selected.\n");
            break;

        default:
            strcpy(passenger[size].baggageType, "Invalid");
            printf("Invalid choice. Please enter again.\n");
}
	
//read back the booking destination in the MMO

flight_d();
passenger[size].Flight = FDO;
  int r2, c2;
  char c2_1[2];
  printf("Select a seat [Ex. 1A] : ");
  scanf("%s",c2_1);
  strcpy(passenger[size].selectedSeat, c2_1);
  r2 = c2_1[0];
  r2 -= 49;  //ASCII
  switch (c2_1[1])
  {
  case 'A':
    c2 = 0;
    break;
  case 'B':
    c2 = 1;
    break;
  case 'C':
    c2 = 2;
    break;
  case 'D':
    c2 = 3;
    break;
  case 'E':
    c2 = 4;
    break;
  case 'F':
    c2 = 5;
    break;
  case 'G':
    c2 = 6;
    break;
  case 'H':
    c2 = 7;
    break;
  case 'I':
    c2 = 8;
    break;
  
  default:
    break;
  }

  FILE *fp;
  switch (FDO)
  {
    case 3008:
      fp = fopen("sweden.txt", "w");
      break;

    case 1420:
      fp = fopen("japan.txt", "w");
      break;

    case 2707:
      fp = fopen("malaysia.txt", "w");
      break;

    case 3428:
      fp = fopen("america.txt", "w");
      break;

    default:
      break;
  }

  switch(ps[r2][c2])
  {
    case 0:
      ps[r2][c2] = 1;
      printf("Seat has been booked");
      break;
    case 1:
      printf("Invalid seat,Please choose again.\n");
      break;
    default:
      break;
  }

  r = 0;
  c = 0;
  while (r<10)// Using a temp var to hold the values
  {
    fprintf(fp, "%d ", ps[r][c]);
    c++;
    if(c==9)
    {
      fprintf(fp, "\n");
      c=0;
      r++;
    }
  }



fclose(fp);
size++;
save();
}
void view_b()
{
  printf("\nFeature Currently Unavailible");
}


void cancel_t()
{
 printf("\nFeature Currently Unavailible");
}


void save()
{
  FILE *fp;
  fp =fopen("bookingdetails.txt","w");
  if(fp==NULL){
    printf("could not load");
  }
  int count=0;
  while(count<size)
  {
    fprintf(fp,"%d %s %s %s %s %s %s %s %s",passenger[count].Flight, passenger[count].name, passenger[count].emailAddress, passenger[count].phoneNumber, passenger[count].passportNumber, passenger[count].passportExpiry,"L", passenger[count].baggageType, passenger[count].selectedSeat);
    count++;
  }
  fclose(fp);
}